<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Slider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider',function (Blueprint $table){
            $table->increments('id');
            $table->integer('item_id');
            $table->string('text',300);
            $table->string('prop1',33);
            $table->string('prop2',33);
            $table->string('prop3',33);
            $table->string('prop4',33);
            $table->boolean('active');
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
        //
    }
}
