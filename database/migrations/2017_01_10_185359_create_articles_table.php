<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->string('kewords')->nullable();
            $table->string('keywords')->nullable();
            $table->string('desc')->nullable();
            $table->text('content')->nullable();
            $table->string('thumb')->nullable();
            $table->string('editor')->nullable();
            $table->integer('order_by')->default(1);
            $table->string('count_views')->default(0);

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
        Schema::drop('articles');
    }
}
