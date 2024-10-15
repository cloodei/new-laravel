<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    // Một danh mục có thể chứa nhiều nội dung
    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
