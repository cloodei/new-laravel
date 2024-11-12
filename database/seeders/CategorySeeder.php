<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $now = now();
        Category::insert([
            [
                'name' => 'Movie',
                'description' => 'Movie',
                'slug' => 'Movie',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'TV Show',
                'description' => 'TV Show',
                'slug' => 'tv-show',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Documentaries',
                'description' => 'Documentaries',
                'slug' => 'Documentaries',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}