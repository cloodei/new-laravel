<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_genre extends Model
{
    use HasFactory;

    protected $table = 'content_genre';

    protected $fillable = [
        'content_id',
        'genre_id',
    ];
}