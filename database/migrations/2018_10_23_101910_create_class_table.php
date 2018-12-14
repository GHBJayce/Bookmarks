<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('cid');
            $table->integer('uid')->unsigned();
            $table->string('name');
            $table->integer('pid')->default(0)->unsigned();
            $table->smallInteger('sort')->nullable()->default(0);
            $table->timestamps();

            $table->index('uid');

            $table->foreign('uid')->references('uid')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
