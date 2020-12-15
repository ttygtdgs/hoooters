<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('name');
            $table->string('email');
            $table->string('lpw');
            $table->string('uname');
            $table->string('icon');
            $table->timestamps();
            $table->string('intro');
            $table->string('site');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->string('p4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
