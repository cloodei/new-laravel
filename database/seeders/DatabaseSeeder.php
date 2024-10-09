<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        //     ['name' => 'Action', 'description' => 'Action movies and shows'],
        //     ['name' => 'Comedy', 'description' => 'Comedy movies and shows'],
        // ]);
        DB::table('genres')->insert([
            ['name' => 'Action', 'slug' => 'action'],
            ['name' => 'Comedy', 'slug' => 'comedy'],
            ['name' => 'Horror', 'slug' => 'horror'],
            ['name' => 'Romance', 'slug' => 'romance'],
            ['name' => 'Sci-Fi', 'slug' => 'sci-fi'],
            ['name' => 'Animation', 'slug' => 'animation'],
            ['name' => 'Adventure', 'slug' => 'adventure'],
            ['name' => 'Fantasy', 'slug' => 'fantasy'],
            ['name' => 'Theatrical', 'slug' => 'theatrical'],
            ['name' => 'TV Series', 'slug' => 'tv-series'],
            ['name' => 'Documentary', 'slug' => 'documentary'],
            ['name' => 'Psychological', 'slug' => 'psychological'],
            ['name' => 'Drama', 'slug' => 'drama'],
            ['name' => 'Thriller', 'slug' => 'thriller'],
            ['name' => 'Family', 'slug' => 'family'],
            ['name' => 'Sports', 'slug' => 'sports'],
            ['name' => 'Musical', 'slug' => 'musical']
        ]);
    }
}
