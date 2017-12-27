<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests',function(Blueprint $table){
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('landlord_id')->unsigned();
                $table->foreign('landlord_id')->references('id')->on('landlords');
                $table->integer('property_id')->unsigned();
                $table->foreign('property_id')->references('id')->on('properties');
		// first request time made by the student
		$table->dateTime('visit_request');
		// second request made by the landlord when the answer is negative, if positive this field is null 
		$table->dateTime('answer_request')->nullable();
		$table->boolean('is_match');
		$table->boolean('is_paid');
		$table->string('promotion_code')->nullable();
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
    	Schema::dropIfExists('requests');

        //
    }
}
