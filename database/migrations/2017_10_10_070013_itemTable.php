<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item',function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->string('title');
            $table->string('url')->unique();
            $table->string('metaDesc',90);
            $table->string('description');
            $table->boolean('active');
            $table->boolean('isOnMain');
            $table->string('image');
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
        Schema::drop('item');

    }
}
