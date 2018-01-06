<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Request;
use App\Property;
use App\User;
use App\Communication;
use Auth;

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


    Mapper::map($property->latitude, $property->longitude,
    ['title' => $property->adress,
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

public function RequestVisitToProperty($id)
{
  /*
  TODO: Verify if any request for the property has been made.
  Only one per property. If any in progress do not allow
  to request another one.
  */

  /* Inputs */
  $property = Property::where("id",$id)->first();  /*TODO: function to validate if the id is a valid property */
  $user = Auth::user();

  $visit_date =    Request::input('visit_date');
  $visit_time =    Request::input('visit_time');

  /* Conver the visit_date to match MYSQL YYYY-MM-DD */
  $visit_date = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1', $visit_date);
  /* Extract necessary data */
  $user_id = $user->id;
  $property_id = $id;

  $Communication_hanlder = new Communication();
  $Communication_hanlder->InsertRequest($property_id, $user_id, $visit_date, $visit_time);
  /*TODO: If any problems detected call $this->index($id) and validate the form once again
  until everything is good to go and only in the end rout it as bellow.

  */

  /* IMPORTANT: When using post to validate forms to prevent a F5 action we just
  redirect to the property page once again. No further problem
  with post will happen.
  */
  return redirect()->route('property', ['id' => $id]);
}





}
