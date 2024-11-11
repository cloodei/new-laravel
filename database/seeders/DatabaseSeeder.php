<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            GenreSeeder::class,
            SeasonSeeder::class,
            ContentSeeder::class,
            ContentGenreSeeder::class,
        ]);
    }
}