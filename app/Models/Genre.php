<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'name',
        'slug',
        'activate'
    ];

    // Một thể loại có thể thuộc về nhiều nội dung
    public function content()
    {
        return $this->belongsToMany(Content::class, 'content_genre', 'genre_id', 'content_id');
    }

}
