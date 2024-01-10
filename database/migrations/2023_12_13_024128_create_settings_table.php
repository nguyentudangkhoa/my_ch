<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('keyword')->nullable();
            $table->longText('description')->nullable();
            $table->text('google_plus')->nullable();
            $table->string('author')->nullable();
            $table->string('book_ticket')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('slogan')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('hot_line')->nullable();
            $table->string('coordinate')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('analytics')->nullable();
            $table->string('vchat')->nullable();
            $table->string('monday')->nullable();
            $table->string('sunday')->nullable();
            $table->string('ph_name')->nullable();
            $table->string('ph_phone')->nullable();
            $table->string('overtime')->nullable();
            $table->string('top_email')->nullable();
            $table->string('top_phone')->nullable();
            $table->string('district_code')->nullable();
            $table->string('from_time')->nullable();
            $table->string('to_time')->nullable();
            $table->string('confirm_text')->nullable();
            $table->string('mst')->nullable();
            $table->string('product_shop_number')->nullable();
            $table->unsignedBigInteger('id_province')->nullable();
            $table->unsignedBigInteger('id_district')->nullable();
            $table->unsignedBigInteger('id_ward')->nullable();
            $table->string('shop_address')->nullable();
            $table->decimal('payment_fee', 16, 4)->nullable();
            $table->string('qlk_name')->nullable();
            $table->string('qlk_phone')->nullable();
            $table->decimal('global_fee', 16, 4)->nullable();
            $table->decimal('payment_fee_1', 16, 4)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
