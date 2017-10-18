<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer',function (Blueprint $table){
           $table->increments('id');
           $table->integer('item_id');
           $table->string('name');
           $table->integer('unit_id');
           $table->integer('material_id');
           $table->integer('price');
           $table->string('duration',25);
           $table->mediumText('description');
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
        Schema::drop('offer');

    }
}
