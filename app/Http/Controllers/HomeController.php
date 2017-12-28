<?php

namespace App\Http\Controllers;

use Request;
use App\Property;
use View;

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
    $min = 75;
    $max = 300;
    $properties = Property::paginate(10);

    return view('home', ['properties' => $properties, 'min' => 75 , 'max' => 300]);

  }

  public function search()
  {
    $options =    Request::input('options');
    $min =    Request::input('min');
    $max =    Request::input('max');

    if($options == "all_rooms")
    {
      $properties = Property::where("price", ">=" , $min)->where("price", "<=" , $max)->paginate(10);
    }
    else
    {
      /* type: single_room, double_room and appartment*/
      $properties = Property::where("type", $options)->where("price", ">=" , $min)->where("price", "<=" , $max)->paginate(10);
    }




    //$properties = Property::where('type', 'like', '%' . $keyword . '%')->paginate(10);

    return view('home', ['properties' => $properties , 'min' => $min , 'max' => $max]);
    //return "{{  $keyword }}";

  }

  public function show($id){
    $img = Property::where("id",$id);


    return view('property/{$id}');
  }

  public function add_to_wishlist($id){

  }

}
