<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VipPackage;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class VipPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->attributes->get('role');
        $user = $request->user();
        $vip = collect();

        if($user->subscription_type === 'free') {
            $vip = VipPackage::whereIn('duration', ['1', '3', '12'])->get();
        }
        elseif($user->subscription_type === 'VIP') {
            $subscription = $user->subscriptions()->latest()->first();
            if($subscription) {
                switch($subscription->package_id) {
                    case 1:
                        $vipOptions = ['1', '3', '12'];
                        break;
                    case 2:
                        $vipOptions = ['3', '12'];
                        break;
                    case 3:
                        $vipOptions = ['12'];
                        break;
                }
                $vip = VipPackage::whereIn('duration', $vipOptions)->get();
            }
        }
        return view('payments.vip', ['role' => $role, 'vip' => $vip]);
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
