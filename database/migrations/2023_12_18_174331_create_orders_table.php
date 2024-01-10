<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('priority')->default(0);
            $table->unsignedBigInteger('shop_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('order_code')->nullable();
            $table->integer('view')->default(0);
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('payment_method_id')->default(1);
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('ward_id');
            $table->decimal('shipping_price', 16, 4)->default(0);
            $table->string('time')->nullable();
            $table->string('ship_code')->nullable();
            $table->string('ship_name')->nullable();
            $table->integer('quantity');
            $table->integer('weight');
            $table->decimal('total_price', 16, 4)->default(0);
            $table->decimal('payment_price', 16, 4)->default(0);
            $table->longText('content')->nullable();
            $table->string('note')->nullable();
            $table->string('shop_note')->nullable();
            $table->string('cancel_content')->nullable();
            $table->integer('status');
            $table->integer('return_order')->default(0);
            $table->string('order_number')->nullable();
            $table->integer('shipping_bill')->nullable();
            $table->dateTime('shipping_bill_date')->nullable();
            $table->integer('is_shipping')->default(0);
            $table->integer('is_shipping_confirm')->default(0);
            $table->integer('payment')->default(0);
            $table->integer('mass')->default(0);
            $table->integer('global_shipping')->default(0);
            $table->decimal('global_fee', 16, 4)->default(0);
            $table->decimal('added_fee', 16, 4)->default(0);
            $table->string('admin_note')->nullable();
            $table->integer('is_complain')->default(0);
            $table->integer('is_refund')->default(0);
            $table->integer('is_payment')->default(0);
            $table->decimal('revenue', 16, 4)->default(0);
            $table->dateTime('refund_date')->nullable();
            $table->string('cancel_note')->nullable();
            $table->integer('cancel_status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('ward_id')->references('id')->on('wards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
