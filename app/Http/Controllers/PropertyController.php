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
use Illuminate\Mail\Mailable;
use Mail;
use App\Mail\NotificationMail;
use App\Mail\NotificationNewRequests;

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

    $image_search = $dir_path . "/*.{jpg,jpeg,gif,png,PNG,JPG}";
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
    [
      'zoom' => 15,
      'scrollWheelZoom' => false,
      'icon' =>'/img/property/house.png',
      'cluster' => false
    ]
  );

  $price_display = '<span class="price_map">' . $property->price . ' €</span>';
  $view_on_maps_display = '</p><a class="view_on_map" target="_blank" href="https://www.google.com/maps/search/?api=1&query=' . $property->latitude . "," . $property->longitude . '">View in Google Maps!</a>';
  $maps_display_text = $price_display . $view_on_maps_display;

  Mapper::informationWindow(
    $property->latitude, $property->longitude,
    $maps_display_text,
    [
      'open' => 'true',
      'animation' => 'NONE',
      'icon' => 'NONE'
    ]
  );

  $path = "img/RoomsPics/" . $property->id;
  $images = $this->RetrieveAllImagesFromProperty($path);

  return view('property', ['property' => $property, 'slider_images' => $images]);

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
  $id_notification = $Communication_hanlder->InsertRequest($property_id, $user_id, $visit_date, $visit_time);

  if($id_notification != null)
  {
    $user = User::where('id','=', $user->id);
    $notification = Communication::where('id','=', $id_notification);

    try {
      Mail::to("shomie.organization@gmail.com")->send(new NotificationNewRequests($notification, $property, $user));
    } catch (Exception $e) {
      /* Do nothing */
    }
  }

  /* IMPORTANT: When using post to validate forms to prevent a F5 action we just
  redirect to the property page once again. No further problem
  with post will happen.
  */
  return redirect()->route('property', ['id' => $id]);
}





}
