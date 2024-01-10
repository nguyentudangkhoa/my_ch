<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('bank_id');
            $table->decimal('total', 16, 4);
            $table->decimal('city_fee', 16, 4)->default(0);
            $table->dateTime('confirm_date');
            $table->tinyInteger('is_confirm')->default(0);
            $table->integer('display')->default(1);
            $table->integer('priority')->default(1);
            $table->decimal('total_receive', 16, 4)->nullable();
            $table->decimal('total_send', 16, 4)->nullable();
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
        Schema::dropIfExists('wallet_details');
    }
}
