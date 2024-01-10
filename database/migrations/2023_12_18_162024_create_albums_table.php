<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_list_id')->default(0)->nullable();
            $table->integer('is_outstanding')->default(0);
            $table->integer('top_nb')->default(0);
            $table->string('type')->nullable();
            $table->string('photo')->nullable();
            $table->string('thumb')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->bigInteger('priority')->default(1);
            $table->integer('display')->default(1);
            $table->bigInteger('view_count')->default(1);
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
        Schema::dropIfExists('albums');
    }
}
