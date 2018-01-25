<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToUsers extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('users', function($table) {
      $table->boolean('type')->default(false);
      $table->integer('landlord_id')->unsigned()->nullable();
    });

    Schema::table('users', function($table) {
      $table->foreign('landlord_id')->references('landlord_id')->on('properties');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {

  }
}
