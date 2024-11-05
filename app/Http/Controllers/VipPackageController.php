<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VipPackage;
use App\Models\User;
use App\Models\Subscription;

class VipPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $subscription_type = $request->attributes->get('subscription_type');
        $role = $request->attributes->get('role');
        $users = User::with('subscriptions')->where('permission', '!=', 'admin')->orderBy('id', 'DESC')->get();

        $vip = collect();

        foreach($users as $user) {
            if($user->subscription_type === 'VIP') {
                $subscription = $user->subscriptions()->latest()->first();
                if($subscription->package_id === 1) {
                    $vip = $vip->merge(VipPackage::whereIn('duration', ['1', '3', '12'])->get());
                }
                elseif($subscription->package_id === 2) {
                    $vip = $vip->merge(VipPackage::whereIn('duration', ['3', '12'])->get());
                }
                elseif($subscription->package_id === 3) {
                    $vip = $vip->merge(VipPackage::where('duration', '12')->get());
                }
            }
        }

        return view('payments.vip', ['role' => $role, 'vip' => $vip, 'subscription_type' => $subscription_type])->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
