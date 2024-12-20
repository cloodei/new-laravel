<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;

class SeasonSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        Season::insert([
            [
                'season_number' => 1,
                'title' => '1',
                'description' => 'Season 1 của các series, giới thiệu và khởi đầu câu chuyện.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 2,
                'title' => '2',
                'description' => 'Season 2 của các series, tiếp tục phát triển các mâu thuẫn và nhân vật.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 3,
                'title' => '3',
                'description' => 'Season 3 của các series, cao trào và sự thay đổi lớn.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 4,
                'title' => '4',
                'description' => 'Season 4 của các series, mở rộng câu chuyện và nhân vật.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 5,
                'title' => '5',
                'description' => 'Season 5 của các series, các xung đột mới và căng thẳng hơn.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 6,
                'title' => '6',
                'description' => 'Season 6 của các series, các nhân vật đối diện với thử thách lớn.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 7,
                'title' => '7',
                'description' => 'Season 7 của các series, các sự kiện bắt đầu đi đến hồi kết.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 8,
                'title' => '8',
                'description' => 'Season 8 của các series, phần kết của câu chuyện.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 9,
                'title' => '9',
                'description' => 'Season 9 của các series, các câu chuyện mở rộng và phần tiếp diễn.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 10,
                'title' => '10',
                'description' => 'Season 10 của các series, câu chuyện tiếp tục mở rộng.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 11,
                'title' => '11',
                'description' => 'Season 11 của các series, đưa câu chuyện tới phần kết và các kết thúc mở.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'season_number' => 12,
                'title' => '12',
                'description' => 'Season 12 của các series, đưa câu chuyện tới phần kết và các kết thúc mở.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}