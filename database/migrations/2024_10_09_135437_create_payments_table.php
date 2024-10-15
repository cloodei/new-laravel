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
        // Bảng vip_packages
        Schema::create('vip_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name', 255)->unique();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
        
        // Bảng payments
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('payment_date')->default(now());
            $table->decimal('payment_amount', 10, 2);
            $table->enum('payment_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });

        // Bảng subscriptions
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->index();
            $table->foreignId('package_id')->constrained('vip_packages')->index()->name('fk_package_id');
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('vip_packages');
    }
};
