<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'title',
        'description',
        'duration',
        'image',
        'trailer',
        'start_date',
        'content_type',
        'category_id',
        'season_id',
        'activate',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function season() {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }

    public function watchlist() {
        return $this->belongsTo(Watchlist::class);
    }

    public function favorites() {
        return $this->belongsTo(Favorite::class);
    }

    public function thuocnhieuGenre() {
        return $this->belongsToMany(Genre::class, 'content_genre', 'content_id', 'genre_id');
    }
}
