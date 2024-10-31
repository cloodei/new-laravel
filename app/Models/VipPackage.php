<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipPackage extends Model
{
    use HasFactory;

    protected $table = 'vip_packages';

    protected $fillable = [
        'package_name',
        'description',
        'duration',
        'price',
    ];

    // Một gói VIP có thể có nhiều đăng ký
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
