<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use View;
use Mapper;


class PropertyController extends Controller
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


  public function RetrieveAllImagesFromProperty($dir_path) {

    $image_search = $dir_path . "/*.{jpg,jpeg,gif,png,JPG}";
    $images = glob($image_search, GLOB_BRACE);

    return $images;
  }




  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($id)
  {
    $property = Property::where("id",$id)->first();

    if($property->latitude == 0.0 && $property->longitude == 0.0)
    {
      /* No coordinates are available. Set them to Coimbra center */
      $property->latitude = +40.2033;
      $property->longitude = -8.4103;
    }
    else
    {
      /* Do nothing - property coordinates are correct */
    }


    Mapper::map($property->latitude, $property->longitude, ['title' => $property->adress,
    'zoom' => 15,
    'scrollWheelZoom' => false,
    'icon' =>'/img/maps/location-marker-green.png'
  ]);
  Mapper::marker(40.209407, -8.421083,
  ['title' => 'Coimbra Academic Association',
  'icon' => '/img/maps/location-marker.png'
]);


Mapper::marker(40.208967, -8.424132,
['title' => 'University of Coimbra',
'icon' => '/img/maps/location-marker.png']);


$images = $this->RetrieveAllImagesFromProperty($property->route);


return view('property', ['property' => $property, 'images' => $images]);

}



public function make_request($property_id,$user_id,$request_time){


}

public function send_sms(){

}

public function verify_email(){

}

public function verify_limits(){


}
}
