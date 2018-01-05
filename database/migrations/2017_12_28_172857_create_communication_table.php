<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {

    Schema::create('communication', function(Blueprint $table){
      $table->increments('id');
      $table->integer('state');
      $table->integer('property_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->date('day');
      $table->string('hour');
    });

    Schema::table('communication', function($table) {
      $table->foreign('property_id')->references('id')->on('properties');
      $table->foreign('user_id')->references('id')->on('users');
    });

  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('communication');

  }
}
