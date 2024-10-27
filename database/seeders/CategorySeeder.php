<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Phim lẻ',
                'description' => 'Phim lẻ các thể loại',
                'slug' => 'phim-le',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phim bộ',
                'description' => 'Phim nhiều tập, phim bộ',
                'slug' => 'phim-bo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phim truyền hình',
                'description' => 'Các phim chiếu trên truyền hình',
                'slug' => 'phim-truyen-hinh',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
