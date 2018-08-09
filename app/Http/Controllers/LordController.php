<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Request;
use App\Property;
use View;
use App\User;
use Auth;
use Validator;
use App\Communication;
use Illuminate\Mail\Mailable;
use Mail;
use App\Mail\NotificationMail;


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

  public function getLandlordProperties($landlord_id)
  {
    $properties = Property::where("landlord_id", $landlord_id);
    return $properties;
  }

  public function update()
  {
    $user = Auth::user();

    $user->name = Request::get('landlord_name');
    $user->phone_number = Request::get('landlord_phone');
    $user->email = Request::get('landlord_email');
    /* TODO: Verify the email (if it is unique as well) and validate the new inputs */

    $user->save();

    return redirect()->route('landlord_profile');
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
      list($id_local, $availability_local) = explode("_", $value, 2);
      $porperties_availabitlity[$property_id_index][] =$id_local;
      $porperties_availabitlity[$availability_index][] = $availability_local;
    }
    return $porperties_availabitlity;
  }

  public function admin_availability_rooms_search()
  {

    $landlord_id = Request::get('admin_landlord_id');

    $properties = $this->getLandlordProperties($landlord_id);
    return view('admin.availability_rooms', ['properties' => $properties->get()]);

  }

  public function admin_availability_rooms_save()
  {
    $porperties_availabitlity = $this->GetPorpertiesNewAvailability(); /* Array with all the indexes and respective property ides */
    $property_id_index = 0;
    $availability_index = 1;

    for($i = 0; $i < count($porperties_availabitlity[$property_id_index]);$i++)
    {
      $property = Property::where("id",$porperties_availabitlity[$property_id_index][$i]);
      if($property!=null)
      {
        $property->update(['availability'=>$porperties_availabitlity[$availability_index][$i]]);
      }
    }

    return redirect()->route('admin_availability_rooms');
  }

  public function available()
  {
    $porperties_availabitlity = $this->GetPorpertiesNewAvailability(); /* Array with all the indexes and respective property ides */
    $property_id_index = 0;
    $availability_index = 1;

    for($i = 0; $i < count($porperties_availabitlity[$property_id_index]);$i++)
    {
      $property = Property::where("id",$porperties_availabitlity[$property_id_index][$i]);
      if($property!=null)
      {
        $property->update(['availability'=>$porperties_availabitlity[$availability_index][$i]]);

        // TODO add new column in properties called updated_at, to change the availability :)
      }
    }

    return redirect()->route('landlord_availability_rooms'); /* TODO: Verify this route */
  }

  public function GetAllNotification()
  {
    $notification = NULL;
    $user = Auth::user();
    $landlord = $user->landlord_id;
    $notification = Communication::join('properties','communication.property_id','=', 'properties.id')
    ->where('properties.landlord_id','=', $landlord)
    ->select('communication.id', 'communication.visit_time', 'communication.visit_date', 'communication.property_id', 'communication.state')->orderBy('visit_date','desc')->orderBy('visit_time', 'asc')->get();

    return $notification;

  }


  public function index()
  {
    $user = Auth::user();

    if($user->type == 0 ){
      return redirect()->route('home');
    }
    else if($user->type == 2){
        return redirect()->route('admin_availability_rooms');
      }

    $properties = $this->getLandlordProperties($user->landlord_id);

    $notifications = $this->GetAllNotification();
    $pending_notification = $notifications->where('state', '=', '0')->count();
    $accepted_notification = $notifications->where('state', '=', '1')->count();
    $rejected_notification = $notifications->where('state', '=', '2')->count();
    $total_notification = $pending_notification + $accepted_notification + $rejected_notification;

    if($total_notification <= 0)
    {
      $total_notification = 1;
    }



    return view('landlord.main_menu', ['properties' => $properties->get(),
    'pending_notification' => $pending_notification,
    'accepted_notification' => $accepted_notification,
    'rejected_notification' => $rejected_notification,
    'total_notification' => $total_notification/100,
    'communications' => $notifications
  ]);
}


public function profile()
{
  $user = Auth::user();

  if($user->type == 0 ){
    return redirect()->route('home');
  }
  else if($user->type == 2){
      return redirect()->route('admin_availability_rooms');
    }

  return view('landlord.profile');
}

public function availability_rooms()
{
  $user = Auth::user();
    if($user->type == 0 || $user->type == 2 ){
      return redirect()->route('home');
    }

    $properties = $this->getLandlordProperties($user->landlord_id);
    return view('landlord.availability_rooms', ['properties' => $properties->get()]);
}

public function admin_availability_rooms()
{
  $user = Auth::user();

  if($user->type == 0 || $user->type == 1){
    return redirect()->route('home');
  }

  return view('admin.availability_rooms');
}

public function landlord_main_menu_reply()
{
  $id = Request::get('id');
  $reply = Request::get('notification_reply');
  $new_notification_state = 0;

  if($reply == "accepted")
  {
    $new_notification_state = 1;
  }
  else if ($reply == "rejected"){
    $new_notification_state = 2;
  }
  else {
    /**Do nothing*/
  }

  if($new_notification_state > 0)
  {
    $notification = Communication::where('id','=', $id);
    if($notification)
    {
      $notification->update(['state'=>$new_notification_state]);

      /* If accepted send an email to the erasmus */
      if($new_notification_state == 1)
      {
        $user_id = Communication::where('id','=', $id)->pluck('user_id');
        $email = User::where('id','=', $user_id)->pluck('email');
        $user = User::where('id','=', $user_id);

        $property_id = Communication::where('id','=', $id)->value('property_id');
        $property = Property::where('id','=', $property_id);


        if(!empty($email))
        {
          try {
            Mail::to($email)->send(new NotificationMail($notification, $property, $user));
          } catch (Exception $e) {
            /* Do nothing */
          }
        }
      }
    }
  }


  return redirect()->route('landlord_main_menu');
}

}
