<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('account_name')->nullable();
            $table->string('shop_title');
            $table->string('slug')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_code');
            $table->string('email');
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->longText('description')->nullable();
            $table->integer('shop_type');
            $table->bigInteger('priority')->default(0);
            $table->integer('display')->default(1);
            $table->bigInteger('view')->default(0);
            $table->integer('is_cancel')->default(0);
            $table->integer('is_pause')->default(0);
            $table->integer('is_online')->default(0);
            $table->integer('pin_code')->nullable();
            $table->integer('reason')->nullable();
            $table->string('notification')->nullable();
            $table->string('banner')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
