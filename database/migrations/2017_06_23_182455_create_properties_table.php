<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('properties',function(Blueprint $table){
      $table->increments('id')->unique();
      $table->string('description');
      $table->string('address');
      $table->string('number')->nullable();
      $table->string('floor')->nullable();
      $table->string('type');
      $table->integer('price');
      $table->integer('capacity')->nullable();
      $table->string('availability')->nullable()->default('not_available');
      $table->integer('number_wcs')->nullable();
      $table->double('latitude', 9, 7)->nullable();
      $table->double('longitude', 10, 7)->nullable();
      $table->boolean('has_living_room')->nullable()->default(false);
      $table->boolean('has_cleaning')->nullable()->default(false);
      $table->boolean('has_terrace')->nullable()->default(false);
      $table->boolean('only_girls')->nullable()->default(false);
      $table->integer('landlord_id')->unsigned();
      $table->string('presentation')->default(false);
      $table->string('zone');
      $table->boolean('stay')->nullable()->default(false);
      $table->boolean('water')->nullable()->default(false);
      $table->boolean('electricity')->nullable()->default(false);
      $table->boolean('gas')->nullable()->default(false);
      $table->boolean('internet')->nullable()->default(false);
      $table->boolean('washing_machine')->nullable()->default(false);
      $table->timestamps();
    });



    Schema::table('properties', function($table) {
      $table->foreign('landlord_id')->references('id')->on('landlords');
    });

    //
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('propertities');
    //
  }
}
