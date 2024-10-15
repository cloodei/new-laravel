<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_id',
    ];

    // Một nội dung yêu thích thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Một nội dung yêu thích liên quan đến một nội dung
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
