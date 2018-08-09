<?php

namespace App\Http\Controllers;

use Request;
use App\Property;
use View;
use App\User;
use Auth;

class HomeController extends Controller
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

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    $user = Auth::user();

    if($user->type==1 ){
      return redirect()->route('landlord_main_menu');
    }
    else if($user->type == 2){
      return redirect()->route('admin_availability_rooms');
    }
    else{
      $min = 100;
      $max = 250;
      $options = "all_rooms";

      $properties = Property::where("availability","available")->paginate(10);
      return view('home', ['properties' => $properties, 'filteroptions' => $options, 'min' => $min , 'max' => $max]);
    }

  }

  public function search()
  {
    $options =    Request::input('options');
    $min =    Request::input('min');
    $max =    Request::input('max');

    if($options == "all_rooms")
    {
      $properties = Property::where("availability","available")->where("price", ">=" , $min)->where("price", "<=" , $max)->paginate(10);
    }
    else
    {

      /* type: single_room, double_room and appartment*/
      $properties = Property::where("availability","available")->where("type", $options)->where("price", ">=" , $min)->where("price", "<=" , $max)->paginate(10);
    }

    return view('home', ['properties' => $properties, 'filteroptions' => $options, 'min' => $min , 'max' => $max]);
  }

  public function show($id){
    $img = Property::where("id",$id);


    return view('property/{$id}');
  }

  public function add_to_wishlist($id){

  }

}
