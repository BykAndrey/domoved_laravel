<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Infopage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('infopage',function (Blueprint $table) {
           $table->increments('id')->index();
           $table->string('title',90);
           $table->string('name',90);
           $table->string('url');
           $table->string('metaDesc');
           $table->mediumText('text');
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
        Schema::drop('infopage');
    }
}
