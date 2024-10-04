<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['movie', 'show']);
            $table->integer('duration');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('genre_id')->nullable()->constrained('genres')->onDelete('set null');
            $table->string('image_url', length: 768);
            $table->string('trailer_url', length: 768);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('content');
    }
};