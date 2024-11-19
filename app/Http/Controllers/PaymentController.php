<?php

namespace App\Http\Controllers;

use App\Models\VipPackage;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function processPayment(Request $request, $packageId) {
        $user = $request->user();
        $payment = $user->payments()->latest()->first();
        if($payment && $payment->payment_status === 'pending') {
            return redirect('/profile')->with('error', 'Bạn đang có một giao dịch chưa xác nhận!');
        }
        else {
            $payment = Payment::create([
                'user_id' => $user->id,
                'payment_amount' => $request->input('amount'),
                'payment_status' => 'pending',
            ]);
    
            return redirect('/profile')->with('success', 'Yêu cầu thanh toán đã được gửi thành công!');
        }
    }

    public function showUserPayments(Request $request) {
        $payments = Payment::with('user')->orderBy('id', 'DESC')->get();
        $role = $request->attributes->get('role');
        return view('payments.showPayment', compact('payments'), ['role' => $role]);
    }

    public function deletePayment($paymentId) {
        $payment = Payment::findOrFail($paymentId);
        $payment->delete();
        return redirect()->back()->with('success', 'Hủy giao dịch thành công.');
    }

    public function showAdminPayments(Request $request) {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $payments = Payment::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function approvePayment(Request $request, $paymentId) {
        $payment = Payment::findOrFail($paymentId);
        $payment->payment_status = 'approved';
        $payment->save();

        $user = User::findOrFail($payment->user_id);
        $user->subscription_type = 'VIP';
        $user->save();
        
        $package = VipPackage::where('price', $payment->payment_amount)->firstOrFail();

        $currentSubscription = Subscription::where('user_id', $user->id)
            ->where('end_date', '>', now())
            ->first();

        if($currentSubscription) {
            if($currentSubscription->package_id !== $package->id && $package->price > $currentSubscription->payment->payment_amount) {
                $currentSubscription->package_id = $package->id;
                $currentSubscription->payment_id = $payment->id;
            }
            
            $currentSubscription->end_date = Carbon::parse($currentSubscription->end_date)->addDays($package->duration);
            $currentSubscription->save();
        } else {
            Subscription::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'payment_id' => $payment->id,
                'start_date' => now(),
                'end_date' => now()->addDays($package->duration),
            ]);
        }

        return redirect()->route('admin.payments')->with('success', 'Gói VIP đã được xử lý thành công.');
    }

    public function rejectPayment($paymentId) {
        $payment = Payment::findOrFail($paymentId);
        $payment->payment_status = 'rejected';
        $payment->save();

        return redirect()->route('admin.payments')->with('error', 'Yêu cầu thanh toán đã bị từ chối.');
    }

    public function showAdminUsers(Request $request) {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $users = User::with('subscriptions')->where('permission', '!=', 'admin')->orderBy('id', 'DESC')->get();
        $remainingDays = [];
        foreach ($users as $user) {
            $currentSubscription = Subscription::where('user_id', $user->id)
                ->where('end_date', '>', now())
                ->first();
            if ($currentSubscription) {
                $remainingDays[$user->id] = now()->diffInDays($currentSubscription->end_date);
            }
        }
        return view('admin.users.index', compact('users', 'remainingDays'));
    }

    public function checkSubscription() {
        $users = User::where('permission', '!=', 'admin')->get();
        foreach ($users as $user) {
            $expiredSubscription = Subscription::where('user_id', $user->id)->where('end_date', '<', now())->first();
            if ($expiredSubscription && $user->subscription_type === 'VIP') {
                $user->subscription_type = 'free';
                $user->save();
                $expiredSubscription->delete();
            }
        }
        return redirect()->route('admin.users')->with('success', 'Cập nhật thành công.');
    }
}