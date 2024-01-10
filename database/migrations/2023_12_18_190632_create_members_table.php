<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->integer('bcoin')->default(0);
            $table->integer('build_up')->default(0);
            $table->string('phone')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('address')->nullable();
            $table->integer('sex')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->integer('active')->default(1);
            $table->dateTime('register_time')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->bigInteger('priority')->default(1);
            $table->string('random_key')->nullable();
            $table->integer('limit_time')->default(0);
            $table->string('facebook_auth')->nullable();
            $table->string('google_auth')->nullable();
            $table->string('com')->nullable();
            $table->integer('display')->default(1);
            $table->integer('block_user')->default(0);
            $table->string('like_product')->nullable();
            $table->string('product_view')->nullable();
            $table->string('oauth_provider')->nullable();
            $table->string('banner')->nullable();
            $table->string('device')->nullable();
            $table->unsignedBigInteger('my_wallet')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('my_wallet')->references('id')->on('wallets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
