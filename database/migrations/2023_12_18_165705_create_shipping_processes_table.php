<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_processes', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('order_reference')->nullable();
            $table->dateTime('order_status_date')->nullable();
            $table->integer('order_status')->nullable();
            $table->string('status_name')->nullable();
            $table->string('currently_location')->nullable();
            $table->longText('note')->nullable();
            $table->integer('type_order')->default(0);
            $table->integer('can_cancel')->default(0);
            $table->string('employee_name')->nullable();
            $table->string('employee_phone')->nullable();
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
        Schema::dropIfExists('shipping_processes');
    }
}
