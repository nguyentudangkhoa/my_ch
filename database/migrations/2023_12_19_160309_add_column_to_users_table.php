<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('daily_id')->default(0);
            $table->string('user_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->change();
            $table->string('address')->nullable();
            $table->tinyInteger('sex')->default(0);
            $table->string('yahoo')->nullable();
            $table->string('skype')->nullable();
            $table->string('company')->nullable();
            $table->string('city')->nullable();
            $table->string('permission')->nullable();
            $table->string('type')->nullable();
            $table->integer('role')->nullable();
            $table->integer('display')->default(1);
            $table->integer('priority')->default(1);
            $table->string('com')->nullable();
            $table->integer('is_change_password')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('daily_id');
            $table->dropColumn('user_name');
            $table->dropColumn('phone');
            $table->string('email')->change();
            $table->dropColumn('address');
            $table->dropColumn('sex');
            $table->dropColumn('yahoo');
            $table->dropColumn('skype');
            $table->dropColumn('company');
            $table->dropColumn('city');
            $table->dropColumn('permission');
            $table->dropColumn('type');
            $table->dropColumn('role');
            $table->dropColumn('display');
            $table->dropColumn('priority');
            $table->dropColumn('com');
            $table->softDeletes();
        });
    }
}
