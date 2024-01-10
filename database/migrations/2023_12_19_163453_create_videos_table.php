<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->integer('is_outstanding')->default(0);
            $table->string('type');
            $table->string('photo')->nullable();
            $table->string('thumb')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('links')->nullable();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->longText('description')->nullable();
            $table->integer('display')->default(1);
            $table->integer('priority')->default(1);
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
