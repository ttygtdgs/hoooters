<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('aid');
            $table->integer('uid');
            $table->integer('cid');
            $table->integer('gid');
            $table->string('service');
            $table->string('art_img');
            $table->string('art_place');
            $table->string('jcomme');
            $table->string('zcomme');
            $table->integer('life_flg');
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
        Schema::dropIfExists('arts');
    }
}
