<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\VipPackage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
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
    
    public function edit(Request $request) {
        $role = $request->attributes->get('role');
        if($role === 'guest') {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }
        return view('pages.userProfile.edit', ['user' => $request->user(), 'role' => $role]);
    }

    public function update(Request $request) {
        $user = $request->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:4|confirmed',
            'image' => 'nullable|image|max:2048'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('profile-images', 'public');
            $user->image = $path;
        }
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
