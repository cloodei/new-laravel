<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContentTypeColumnInContentsTable extends Migration
{
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            // Change to string if you want to store 'Regular' and 'Premium'
            $table->string('content_type')->change();

            // Or use enum if you want a fixed set of values
            // $table->enum('content_type', ['Regular', 'Premium'])->change();
        });
    }

    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            // Revert back to integer type if needed
            $table->integer('content_type')->change();
        });
    }
}