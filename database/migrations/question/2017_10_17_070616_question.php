<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Question extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->mediumText('question');
            $table->mediumText('answer');
            $table->boolean('active');

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
