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
        'genre_id',
        'activate',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }

    // Nội dung có thể xuất hiện trong danh sách theo dõi
    public function watchlist()
    {
        return $this->belongsTo(Watchlist::class);
    }

    // Nội dung có thể xuất hiện trong danh sách yêu thích
    public function favorites()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function thuocnhieuGenre()
    {
        return $this->belongsToMany(Genre::class, 'content_genre', 'content_id', 'genre_id');
    }
}
