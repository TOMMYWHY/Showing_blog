<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('level')->default(1);   //判断分类级别 1为一级分类 2为二级分类
            $table->integer('parent_id')->default(0);//0 表示一级分类 其他数值表示对应的父级分类
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('desc')->nullable();
            $table->tinyInteger('order_by')->default(0);
//            $table->integer('count_views')->default(0);
//            $table->string('en_name',50)->nullable();
//            $table->string('reserve1')->nullable();
//            $table->string('reserve2')->nullable();
            $table->timestamps();
//            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void:
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
