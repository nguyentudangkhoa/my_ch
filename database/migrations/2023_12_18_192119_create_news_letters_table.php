<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_letters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('gender')->default(1);
            $table->string('product')->nullable();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('priority')->default(1);
            $table->integer('display')->default(1);
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
        Schema::dropIfExists('news_letters');
    }
}
