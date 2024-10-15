<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'permission',
        'subscription_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasPermission(string $permission): bool
    {
        return $this->permission === $permission;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Một người dùng có thể có nhiều thanh toán
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Một người dùng có thể có nhiều gói đăng ký
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // Một người dùng có thể có nhiều mục trong danh sách theo dõi
    public function watchlist()
    {
        return $this->hasMany(Watchlist::class);
    }

    // Một người dùng có thể có nhiều nội dung yêu thích
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
