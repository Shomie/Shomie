<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Auth;

class UserProfile extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {

    $user =  Auth::user();

    return view('UserProfile', ['user' => $user]);
  }


  public function verify_form_data()
  {

  }

}
