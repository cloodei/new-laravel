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
        
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->string('slug', 100);
            $table->timestamps();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->integer('activate');
            $table->timestamps();
        });

        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('season_number')->unsigned();
            $table->string('title', 255);
            $table->text('description');
            $table->timestamps();
        });

        // Bảng content
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->string('image', 255);
            $table->string('trailer', 255);
            $table->integer('duration')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('content_type');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('season_id')->constrained('seasons');
            $table->foreignId('genre_id')->constrained('genres');
            $table->integer('activate');
            $table->timestamps();
        });

        // Bảng watchlist
        Schema::create('watchlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            $table->enum('status', ['watching', 'completed', 'paused'])->default('watching');
            $table->timestamps();
        });
        
        // Bảng favorites
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('content_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('contents');
            $table->foreignId('genre_id')->constrained('genres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('watchlist');
        Schema::dropIfExists('content_genre');
    }
};
