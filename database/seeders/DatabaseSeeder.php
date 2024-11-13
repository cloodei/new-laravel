<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\VipPackage;
use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\Models\Payment;
use Database\Seeders\CategorySeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\SeasonSeeder;
use Database\Seeders\ContentSeeder;
use Database\Seeders\ContentGenreSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $now = now();
        // VipPackage::insert([
        //     [
        //         'package_name' => 'VIP Tháng',
        //         'description' => 'Gói VIP cho một tháng, cho phép truy cập không giới hạn vào toàn bộ phim và series, cùng với chất lượng hình ảnh cao nhất và không quảng cáo.',
        //         'duration' => '1',
        //         'price' => '75000',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'package_name' => 'VIP Quý',
        //         'description' => 'Gói VIP cho ba tháng, bao gồm tất cả quyền lợi của gói tháng, cộng thêm 10% giảm giá cho các dịch vụ khác và các nội dung độc quyền.',
        //         'duration' => '3',
        //         'price' => '200000',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'package_name' => 'VIP Năm',
        //         'description' => 'Gói VIP cho một năm, với tất cả các quyền lợi của gói quý, cộng thêm ưu đãi độc quyền và truy cập sớm vào các bộ phim mới.',
        //         'duration' => '12',
        //         'price' => '750000',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        // ]);

        // User::factory()->admin()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin',
        //     'password' => 'admin',
        //     'subscription_type' => 'VIP',
        // ]);
        // User::factory()->create([
        //     'name' => 'user',
        //     'email' => 'user@user',
        //     'password' => '1',
        //     'subscription_type' => 'Free',
        // ]);
        // User::factory()->create([
        //     'name' => 'aaaa',
        //     'email' => 'aaaa@aaaa',
        //     'password' => '1',
        //     'subscription_type' => 'VIP',
        // ]);
        // User::factory()->create([
        //     'name' => 'helloworld',
        //     'email' => 'hello@world',
        //     'password' => '1',
        //     'subscription_type' => 'VIP',
        // ]);
        // Payment::insert([
        //     [
        //         'user_id' => 1,
        //         'payment_date' => $now,
        //         'payment_amount' => 750000,
        //         'payment_status' => 'approved',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'user_id' => 3,
        //         'payment_date' => $now,
        //         'payment_amount' => 200000,
        //         'payment_status' => 'approved',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'user_id' => 4,
        //         'payment_date' => $now,
        //         'payment_amount' => 200000,
        //         'payment_status' => 'approved',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        // ]);
        // Subscription::insert([
        //     [
        //         'user_id' => 1,
        //         'payment_id' => 1,
        //         'package_id' => 3,
        //         'start_date' => $now,
        //         'end_date' => $now->addYear(),
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'user_id' => 3,
        //         'payment_id' => 2,
        //         'package_id' => 2,
        //         'start_date' => $now,
        //         'end_date' => $now->addMonths(3),
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'user_id' => 4,
        //         'payment_id' => 3,
        //         'package_id' => 2,
        //         'start_date' => $now,
        //         'end_date' => $now->addMonths(3),
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ],
        // ]);

        User::factory()->admin()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => 'admin',
            'subscription_type' => 'VIP',
        ]);
        
        $this->call([
            CategorySeeder::class,
            GenreSeeder::class,
            SeasonSeeder::class,
            ContentSeeder::class,
            ContentGenreSeeder::class,
        ]);
    }
}