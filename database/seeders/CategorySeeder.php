<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            [
                'name' => 'Movies',
                'description' => 'Moives',
                'slug' => 'Movies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Series',
                'description' => 'Series',
                'slug' => 'Series',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Documentaries',
                'description' => 'Documentaries',
                'slug' => 'Documentaries',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}