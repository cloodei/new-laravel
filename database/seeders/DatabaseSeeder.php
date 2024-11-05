<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VipPackage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\UserFactory;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ContentSeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\SeasonSeeder;

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
    }
}