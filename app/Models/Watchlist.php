<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_id',
        'status',
    ];

    // Một mục trong danh sách theo dõi thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Một mục trong danh sách theo dõi liên quan đến một nội dung
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
