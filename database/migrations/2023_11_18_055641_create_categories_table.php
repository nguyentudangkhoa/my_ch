<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_daily')->default(0);
            $table->string('type')->default('product');
            $table->boolean('feature')->default(0);
            $table->string('name');
            $table->string('slug');
            $table->string('advertising')->nullable();
            $table->string('advertising_thumb')->nullable();
            $table->string('left_advertising')->nullable();
            $table->string('left_advertising_thumb')->nullable();
            $table->string('link_left_advertising')->nullable();
            $table->string('right_advertising')->nullable();
            $table->string('right_advertising_thumb')->nullable();
            $table->string('link_advertising')->nullable();
            $table->string('photo')->nullable();
            $table->string('thumb')->nullable();
            $table->string('icon')->nullable();
            $table->bigInteger('priority')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('display')->default(true);
            $table->string('second_thumb')->nullable();
            $table->string('second_photo')->nullable();
            $table->string('title')->nullable();
            $table->integer('catalog')->default(true);
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('parent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
