<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id',
        'package_id',
        'payment_id',
        'start_date',
        'end_date',
    ];

    // Một đăng ký thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Một đăng ký liên quan đến một gói VIP
    public function vipPackage()
    {
        return $this->belongsTo(VipPackage::class, 'package_id');
    }

    // Một đăng ký có thể liên kết với một thanh toán
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
