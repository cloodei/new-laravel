<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_date',
        'payment_amount',
        'payment_status',
    ];

    // Một thanh toán thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Một thanh toán có thể liên kết với một đăng ký
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function vipPackage()
    {
        return $this->hasOneThrough(VipPackage::class, Subscription::class, 'payment_id', 'id', 'id', 'package_id');
    }
}
