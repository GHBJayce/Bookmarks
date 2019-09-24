<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            // 引擎默认是InnoDB
            // $table->engine = 'InnoDB';

            $table->increments('bm_id');
            $table->integer('uid')->unsigned();
            $table->string('title', 100);
            $table->string('url', 2000);
            $table->mediumInteger('access_num')->unsigned()->default(0);
            $table->integer('last_access_time')->unsigned()->nullable();
            $table->tinyInteger('is_like')->default(0);
            $table->integer('create_time')->unsigned();
            $table->integer('update_time')->unsigned()->nullable();

            $table->index(['uid', 'title']);

            // 创表的时候可以一起创建外键。创建外键失败时，要检查外键的字段名称、字段类型是否是一致
            $table->foreign('uid')->references('uid')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        /*
        // 可以不用这种方式
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->foreign('uid')->references('uid')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
