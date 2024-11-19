<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VipPackage;
use App\Models\User;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class VipPackageController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->attributes->get('role');
        $user = $request->user();

        if ($role === 'guest') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

        if ($user->subscription_type === 'free') {
            $vip = VipPackage::where('duration', '>=', 0)->get();
        }
        elseif ($user->subscription_type === 'VIP') {
            $subscription = $user->subscriptions()->latest()->first();

            $currentPackage = VipPackage::find($subscription->package_id);

            $vip = VipPackage::where('duration', '>=', $currentPackage->duration)
                            ->orderBy('duration', 'asc')
                            ->get();
        }

        return view('payments.vip', ['role' => $role, 'vip' => $vip]);
    }


    public function create()
    {
        return view('admin.vippackages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'package_name' => 'required|string|max:255|unique:vip_packages,package_name',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1',
            ],
            [
                'package_name.required' => 'Chưa điền tên gói!',
                'description.required' => 'Chưa điền mô tả!',
                'price.required' => 'Chưa điền giá gói!',
                'duration.required' => 'Chưa điền thời gian gói!',
            ]
        );

        $package = new VipPackage();
        $package->package_name = $data['package_name'];
        $package->description = $data['description'];
        $package->price = $data['price'];
        $package->duration = $data['duration'];

        $package->save();

        return redirect()->route('vippackages.show')->with('status', 'Thêm VIP package thành công!');
    }

    public function show(Request $request)
    {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $vippackages = VipPackage::orderBy('id')->get();
        return view('admin.vippackages.index')->with(compact('vippackages'));
    }

    public function edit(Request $request, string $id)
    {
        if($request->attributes->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
        $vippackage = VipPackage::findOrFail($id);
        return view('admin.vippackages.edit')->with(compact('vippackage'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'package_name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1',
            ],
            [
                'package_name.required' => 'Chưa điền tên gói!',
                'description.required' => 'Chưa điền mô tả!',
                'price.required' => 'Chưa điền giá gói!',
                'duration.required' => 'Chưa điền thời gian gói!',
            ]
        );

        $package = VipPackage::findOrFail($id);

        $package->package_name = $data['package_name'];
        $package->description = $data['description'];
        $package->price = $data['price'];
        $package->duration = $data['duration'];

        if ($package->save()) {
            return redirect()->route('vippackages.show')->with('status', 'Cập nhật VIP package thành công!');
        }

        return redirect()->back()->with('error', 'Cập nhật VIP package thất bại, vui lòng thử lại.');
    }


    public function destroy(string $id)
    {
        //
    }
}
