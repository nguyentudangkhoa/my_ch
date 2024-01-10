<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackGroundWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_ground_webs', function (Blueprint $table) {
            $table->id();
            $table->string('repeat')->nullable();
            $table->string('top')->nullable();
            $table->string('left')->nullable();
            $table->string('fix_bg')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('type')->nullable();
            $table->string('photo')->nullable();
            $table->string('second_photo')->nullable();
            $table->string('third_photo')->nullable();
            $table->string('fourth_photo')->nullable();
            $table->bigInteger('priority')->nullable();
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
        Schema::dropIfExists('back_ground_webs');
    }
}
