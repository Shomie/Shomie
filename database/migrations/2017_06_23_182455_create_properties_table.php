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
		$table->increments('id');
		$table->string('description');
		$table->string('adress');
		$table->string('number')->nullable();
		$table->string('floor')->nullable();
		$table->string('type');
		$table->integer('price');
		$table->integer('capacity')->nullable();
		$table->string('availibility')->nullable();
		$table->integer('number_wcs')->nullable();
		$table->float('latitude',6)->nullable();
		$table->float('longitude',6)->nullable();
		$table->boolean('has_living_room')->nullable();
		$table->boolean('has_cleaning')->nullable();
		$table->boolean('expenses_included')->nullable();
		$table->string('flatmates')->nullable();
		$table->boolean('has_terrace')->nullable();
		$table->boolean('only_girls')->nullable();
		$table->integer('landlord_id')->unsigned();
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
