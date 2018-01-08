<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Request;
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


  public function update()
  {
    $user = Auth::user();
    $user->name = Request::input('landlord_name');

    $user->save();
    return redirect()->route('landlord', ['notice' => 'O usuario foi modificado correctamente.']);
  }

  public function index()
  {
    $properties = $this->getLandlordProperties();
    return view('profile_landlord', ['properties' => $properties->get()]);
  }


}
