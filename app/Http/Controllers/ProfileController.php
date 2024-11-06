<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\VipPackage;

class ProfileController extends Controller
{
    //
    public function index(Request $request) {
        $role = $request->attributes->get('role');
        if($role === 'guest') {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }
        $user = $request->user();
        
        $pendingPayment = Payment::where('user_id', $user->id)
            ->where('payment_status', 'pending')
            ->with('vipPackage')
            ->first();

        $currentPendingPackage = null;
        $currentSubscriptionPackage = null;
        if($pendingPayment) {
            $currentPendingPackage = VipPackage::where('price', $pendingPayment->payment_amount)->first()->package_name;
        }
        
        $currentSubscription = Subscription::where('user_id', $user->id)
            ->where('end_date', '>', now())
            ->with('vipPackage', 'payment')
            ->first();
        if($currentSubscription) {
            $currentSubscriptionPackage = VipPackage::where('id', $currentSubscription->package_id)->first()->package_name;
        }

        return view('pages.userProfile.index', [
            'role' => $role,
            'user' => $user,
            'pendingPayment' => $pendingPayment,
            'currentSubscription' => $currentSubscription,
            'currentPendingPackage' => $currentPendingPackage,
            'currentSubscriptionPackage' => $currentSubscriptionPackage
        ]);
    }
}
