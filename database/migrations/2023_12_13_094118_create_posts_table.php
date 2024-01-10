<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_list_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_item_id');
            $table->string('type');
            $table->integer('is_outstanding')->default(0);
            $table->integer('is_best_seller')->default(0);
            $table->string('photo')->nullable();
            $table->string('thumb')->nullable();
            $table->string('name')->nullable();
            $table->string('product_code')->nullable();
            $table->string('link')->nullable();
            $table->string('slug')->nullable();
            $table->string('discount_text')->nullable();
            $table->longText('information')->nullable();
            $table->string('warranty')->nullable();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->integer('des_char')->default(0);
            $table->integer('is_noindex')->default(0);
            $table->decimal('price', 16, 4)->default(0);
            $table->decimal('old_price', 16, 4)->default(0);
            $table->longText('body_content')->nullable();
            $table->bigInteger('priority')->default(0);
            $table->integer('display')->default(0);
            $table->integer('view_number')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('is_domestic')->default(0);
            $table->integer('is_overseas')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
