<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Request;
use App\Property;
use View;
use App\User;
use Auth;
use Validator;



class LordController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    /* Check if the user is logged in*/
    $this->middleware('auth');
    /* TODO: If in the index the user is not an landlord send it away */
  }


  public function getLandlordProperties()
  {
    $user = Auth::user();
    $landlord = $user->landlord_id;
    $properties = Property::where("landlord_id", $landlord);
    return $properties;
  }


  public function update()
  {
    $user = Auth::user();
    /*
    $data = Request::all();

    $rules = array(
    'landlord_name' => 'required',
    'landlord_email' => 'required|email|unique:users,email,',
    'lanlord_number' => 'required|min:9|max14');

    $validator = Validator::make($data,$rules);
    */

    $user->name = Request::get('landlord_name');
    $user->phone_number = Request::get('landlord_phone');
    $user->email = Request::get('landlord_email');
    $user->save();

    return redirect()->route('landlord', ['notice' => 'O usuario foi modificado correctamente.']);
  }

  public function GetPorpertiesNewAvailability()
  {
    $porperties_availabitlity = array();
    $porperties_availabitlity[]= array(); // $id is the index
    $porperties_availabitlity[]= array(); // $availability is the index
    $property_id_index = 0;
    $availability_index = 1;
    foreach(Request::get('landlord_houses') as $key => $value)
    {
      list($id_local, $availability_local) = explode("_", $value);
      $porperties_availabitlity[$property_id_index][] =$id_local;
      $porperties_availabitlity[$availability_index][] = $availability_local;
    }
    return $porperties_availabitlity;
  }

  public function available()
  {

    $porperties_availabitlity = $this->GetPorpertiesNewAvailability(); /* Array with all the indexes and respective property ides */
    $property_id_index = 0;
    $availability_index = 1;

    for($i = 0; $i < count($porperties_availabitlity);$i++)
    {
      /* One item to process: */
      // $porperties_availabitlity[$availability_index][$i];
      // $porperties_availabitlity[$property_id_index][$i];
      /* TODO: Update each availability in the database. */
    }

    return redirect()->route('landlord');
  }



  public function index()
  {
    $properties = $this->getLandlordProperties();
    return view('profile_landlord', ['properties' => $properties->get()]);
  }

}
