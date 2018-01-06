<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'communication';

  /* Develop here the methods to extract the database data and then
  in the controller we can call this functions like this:
  Communication::function_name();
  */

  /* Important note (how to use):
  $Communication_hanlder = new Communication();
  $Communication_hanlder->InsertRequest($property_id, $user_id, $visit_date, $visit_time);

  Otherwise the method would need to be defined as follow:
  public static function InsertRequest($property_id, $user_id, $visit_date, $visit_time){}
  then to call it it would like this: Communication::InsertRequest($property_id, $user_id, $visit_date, $visit_time)

  */
  public function InsertRequest($property_id, $user_id, $visit_date, $visit_time){
    Communication::insert([
      ['property_id' => $property_id, 'user_id' => $user_id, 'visit_date' => $visit_date, 'visit_time' => $visit_time]
    ]);
  }

}
