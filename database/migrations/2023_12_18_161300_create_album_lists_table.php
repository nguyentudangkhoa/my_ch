<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_lists', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('album');
            $table->string('name');
            $table->string('slug');
            $table->string('advertising')->nullable();
            $table->string('advertising_thumb')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('thumb')->nullable();
            $table->bigInteger('priority')->default(0);
            $table->tinyInteger('display')->default(0);
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
        Schema::dropIfExists('album_lists');
    }
}
