<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('cid');
            $table->integer('uid')->unsigned();
            $table->string('name', 10);
            $table->smallInteger('sort')->nullable()->default(0);
            $table->integer('pid')->default(0)->unsigned();
            $table->timestamps();

            $table->index(['uid', 'name']);

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
        Schema::dropIfExists('classes');
    }
}
