<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYahoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yahoos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('yahoo');
            $table->string('skype');
            $table->string('phone');
            $table->string('email');
            $table->integer('display')->default(1);
            $table->integer('priority')->default(1);
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
        Schema::dropIfExists('yahoos');
    }
}
