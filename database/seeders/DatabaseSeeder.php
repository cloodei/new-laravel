<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VipPackage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Content;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Season;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => 'admin',
            'subscription_type' => 'VIP',
        ]);

        VipPackage::create([
            'package_name' => 'VIP Tháng',
            'description' => 'Gói VIP cho một tháng, cho phép truy cập không giới hạn vào toàn bộ phim và series, cùng với chất lượng hình ảnh cao nhất và không quảng cáo.',
            'duration' => '1',
            'price' => '75000',
        ]);
        
        VipPackage::create([
            'package_name' => 'VIP Quý',
            'description' => 'Gói VIP cho ba tháng, bao gồm tất cả quyền lợi của gói tháng, cộng thêm 10% giảm giá cho các dịch vụ khác và các nội dung độc quyền.',
            'duration' => '3',
            'price' => '200000',
        ]);
        
        VipPackage::create([
            'package_name' => 'VIP Năm',
            'description' => 'Gói VIP cho một năm, với tất cả các quyền lợi của gói quý, cộng thêm ưu đãi độc quyền và truy cập sớm vào các bộ phim mới.',
            'duration' => '12',
            'price' => '750000',
        ]);

        Category::create([
            'name' => 'Movie',
            'description' => 'Movies are a form of visual communication that uses moving pictures and sound to tell stories or inform (help people to learn). People in every part of the world watch movies as a type of entertainment, a way to have fun.',
            'slug' => 'movie',
        ]);

        Category::create([
            'name' => 'TV Show',
            'description' => 'A television show (often simply TV show) is any content produced for broadcast via over-the-air, satellite, cable, or internet and typically viewed on a television set, excluding breaking news, advertisements, or trailers that are typically placed between shows.',
            'slug' => 'tv-show',
        ]);

        Genre::create([
            'name' => 'Action',
            'slug' => 'action',
            'activate' => '1',
        ]);
        
        Genre::create([
            'name' => 'Adventure',
            'slug' => 'adventure',
            'activate' => '1',
        ]);

        Season::create([
            'season_number' => '1',
            'title' => 'Season 1',
            'description' => 'The first season of the American television series The Flash premiered on The CW on October 7, 2014, and concluded on May 19, 2015, after airing 23 episodes.',
        ]);

        Content::create([
            'title' => 'The Falcon and the Winter Soldier',
            'description' => 'Following the events of “Avengers: Endgame”, the Falcon, Sam Wilson and the Winter Soldier, Bucky Barnes team up in a global adventure that tests their abilities, and their patience.',
            'duration' => '135',
            'image' => Storage::url('public/images/movie14.jpg'),
            'trailer' => Storage::url('public/trailer/trailer1.mp4'),
            'start_date' => '2021-03-19',
            'content_type' => '1',
            'category_id' => '1',
            'season_id' => '1',
            'genre_id' => '1',
            'activate' => '1',
        ]);
    }
}