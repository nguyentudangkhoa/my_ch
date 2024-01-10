<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('list_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable()->default(0);
            $table->unsignedBigInteger('shop_id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('delivery_time');
            $table->integer('rate');
            $table->text('price_text');
            $table->text('size');
            $table->text('size_image');
            $table->text('stock_quantity');
            $table->text('stock_quantity_size');
            $table->text('type');
            $table->text('product_photo')->nullable();
            $table->text('product_thumb')->nullable();
            $table->text('keywords')->nullable();
            $table->text('product_code');
            $table->double('weight')->nullable();
            $table->integer('des_char')->default(0);
            $table->integer('is_noindex')->default(0);
            $table->decimal('price', 16, 4)->default(0);
            $table->decimal('old_price', 16, 4)->default(0);
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('attribute')->nullable();
            $table->integer('sold_quantity')->default(0);
            $table->integer('deal_quantity')->default(0);
            $table->integer('view')->default(0);
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->string('color')->nullable();
            $table->integer('ggsp')->default(0);
            $table->integer('best_seller')->default(0);
            $table->integer('is_outstanding')->default(0);
            $table->integer('status')->default(0);
            $table->integer('is_order')->default(0);
            $table->string('title')->nullable(0);
            $table->integer('is_violation')->default(0);
            $table->integer('approval')->default(0);
            $table->integer('display')->default(1);
            $table->longText('violation_content')->nullable();
            $table->timestamps();
            $table->softDeletes();

//            $table->foreign('category_id')->references('id')->on('categories');
//            $table->foreign('list_id')->references('id')->on('categories');
//            $table->foreign('shop_id')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
