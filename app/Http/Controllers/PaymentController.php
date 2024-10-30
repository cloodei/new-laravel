<?php

namespace App\Http\Controllers;

use App\Models\VipPackage;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function showPaymentPage(Request $request, $packageId)
    {
        $package = VipPackage::findOrFail($packageId);
        $role = $request->attributes->get('role');
        return view('payments.show', compact('package'), ['role' => $role]);
    }

    public function processPayment(Request $request, $packageId)
    {
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'payment_amount' => $request->input('amount'),
            'payment_status' => 'pending',
        ]);

        return redirect()->route('payments.index', $packageId)->with('success', 'Yêu cầu thanh toán đã được gửi.');
    }

    public function showUserPayments(Request $request)
    {
        $payments = Payment::with('user')->orderBy('id', 'DESC')->get();
        $role = $request->attributes->get('role');
        return view('payments.showPayment', compact('payments'), ['role' => $role]);
    }

    public function deletePayment($paymentId){
        $payment = Payment::findOrFail($paymentId);

        $payment->delete();

        return redirect()->back()->with('success', 'Hủy giao dịch thành công.');
    }


    public function showAdminPayments()
    {
        $payments = Payment::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function approvePayment(Request $request, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->payment_status = 'approved';
        $payment->save();

        $user = User::findOrFail($payment->user_id);
        $user->subscription_type = 'VIP';
        $user->save();
        
        $package = VipPackage::where('price', $payment->payment_amount)->firstOrFail();

        switch ($package->duration) {
            case '1':
                $duration = 1;
                break;
            case '3':
                $duration = 3;
                break;
            case '12':
                $duration = 12;
                break;
        }

        $currentSubscription = Subscription::where('user_id', $user->id)
            ->where('end_date', '>', now())
            ->first();

        if ($currentSubscription) {
            if ($currentSubscription->package_id !== $package->id && $package->price > $currentSubscription->payment->payment_amount) {
                $currentSubscription->package_id = $package->id;
                $currentSubscription->payment_id = $payment->id;
            }
            
            $currentSubscription->end_date = Carbon::parse($currentSubscription->end_date)->addMonths($duration);
            $currentSubscription->save();
        } else {
            Subscription::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'payment_id' => $payment->id,
                'start_date' => now(),
                'end_date' => now()->addMonths($duration),
            ]);
        }

        return redirect()->route('admin.payments')->with('success', 'Gói VIP đã được xử lý thành công.');
    }

    public function rejectPayment($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->payment_status = 'rejected';
        $payment->save();

        return redirect()->route('admin.payments')->with('error', 'Yêu cầu thanh toán đã bị từ chối.');
    }
}