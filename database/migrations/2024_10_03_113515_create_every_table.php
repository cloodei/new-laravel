<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vip_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name', 255)->unique(); // Tên gói VIP
            $table->decimal('price', 10, 2); // Giá gói VIP
            $table->timestamps();
        });
        
        // Bảng payments
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Liên kết với bảng users
            $table->timestamp('payment_date')->default(now()); // Ngày thanh toán
            $table->decimal('payment_amount', 10, 2); // Số tiền thanh toán
            $table->enum('payment_status', ['pending', 'approved', 'rejected'])->default('pending'); // Trạng thái thanh toán
            $table->timestamps();
        });

        // Bảng subscriptions
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->index(); // Liên kết với bảng users
            $table->foreignId('package_id')->constrained('vip_packages'); // Liên kết với bảng vip_packages
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onDelete('cascade'); // Liên kết với bảng payments
            $table->date('start_date'); // Ngày bắt đầu đăng ký
            $table->date('end_date'); // Ngày kết thúc đăng ký
            $table->timestamps();
        });
                        
        // Bảng content
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); // Tên nội dung
            $table->text('description'); // Mô tả nội dung
            $table->string('image_url', 768); // URL hình ảnh
            $table->string('trailer_url', 768); // URL trailer
            $table->date('start_date'); // Ngày phát hành
            $table->enum('content_type', ['VIP', 'Regular'])->default('Regular'); // Loại nội dung
            $table->timestamps();
        });
        
        // Bảng categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique(); // Tên danh mục
            $table->text('description')->nullable(); // Mô tả danh mục
            $table->string('slug', 128); // Slug của danh mục
            $table->foreignId('content_id')->constrained('content'); // liên kết bảng content
            $table->timestamps();
        });
        
        // Bảng seasons
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('season_number'); // Số mùa
            $table->string('title')->nullable(); // Tên mùa
            $table->text('description')->nullable(); // Mô tả mùa
            $table->foreignId('content_id')->constrained('content'); // Liên kết với bảng content
            $table->timestamps();
        });
        
        // Bảng genres
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique(); // Tên thể loại
            $table->string('slug')->unique(); // slug của thể loại
            $table->foreignId('content_id')->constrained('content'); // liên kết với bảng content
            $table->timestamps();
        });

        // Bảng watchlist
        Schema::create('watchlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Liên kết với bảng users
            $table->foreignId('content_id')->constrained('content')->onDelete('cascade'); // Nội dung được theo dõi
            $table->enum('status', ['watching', 'completed', 'paused'])->default('watching'); // Trạng thái xem (đang xem, đã xem)
            $table->timestamps();
        });
        
        // Bảng favorites
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Liên kết với bảng users
            $table->foreignId('content_id')->constrained('content')->onDelete('cascade'); // Nội dung yêu thích
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('watchlist');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('content');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('vip_packages');
    }
};