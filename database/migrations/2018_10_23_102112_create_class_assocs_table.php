<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassAssocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_assocs', function (Blueprint $table) {
            $table->increments('ca_id');
            $table->integer('uid')->unsigned();
            $table->integer('cid')->unsigned();
            $table->integer('bm_id')->unsigned();

            $table->index(['uid', 'cid', 'bm_id']);

            $table->foreign('uid')->references('uid')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cid')->references('cid')->on('class')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bm_id')->references('bm_id')->on('bookmarks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_assocs');
    }
}
