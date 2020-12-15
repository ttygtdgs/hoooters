<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corps', function (Blueprint $table) {
            $table->increments('cid');
            $table->string('cname');
            $table->integer('curl');
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
        Schema::dropIfExists('corps');
    }
}
