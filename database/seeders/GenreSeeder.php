<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        Genre::insert([
            ['name' => 'Action', 'slug' => 'action', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Comedy', 'slug' => 'comedy', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Horror', 'slug' => 'horror', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Romance', 'slug' => 'romance', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sci-Fi', 'slug' => 'sci-fi', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Animation', 'slug' => 'animation', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adventure', 'slug' => 'adventure', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fantasy', 'slug' => 'fantasy', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Theatrical', 'slug' => 'theatrical', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TV Series', 'slug' => 'tv-series', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Documentary', 'slug' => 'documentary', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Psychological', 'slug' => 'psychological', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Drama', 'slug' => 'drama', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thriller', 'slug' => 'thriller', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Family', 'slug' => 'family', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports', 'slug' => 'sports', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Musical', 'slug' => 'musical', 'activate' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}