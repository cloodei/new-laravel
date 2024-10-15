<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';

    protected $fillable = [
        'season_number',
        'title',
        'description',
    ];

    // Một mùa có thể thuộc về nhiều nội dung
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
