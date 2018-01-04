<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;
use View;
use App\User;
use Auth;


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

  public function index()
  {
    $properties = $this->getLandlordProperties();
    return view('profile_landlord', ['properties' => $properties->get()]);
  }



}
