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
use App\Mail\DemoMail;



class ErasmusController extends Controller
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

  public function GetAllNotification()
  {
    $notification = NULL;
    $user = Auth::user();
    $erasmus_id = $user->id;
    $notification = Communication::join('properties','communication.property_id','=', 'properties.id')
    ->where('communication.user_id','=', $erasmus_id)
    ->select('communication.id', 'communication.visit_time', 'communication.visit_date', 'communication.property_id', 'communication.state', 'properties.address', 'properties.floor', 'properties.number')->get();

    return $notification;

  }

  public function index()
  {
    $user = Auth::user();


    if($user->type == 1 ){
      return redirect()->route('home');
    }

    $notifications = $this->GetAllNotification();
    $pending_notification = $notifications->where('state', '=', '0')->count();
    $accepted_notification = $notifications->where('state', '=', '1')->count();
    $rejected_notification = $notifications->where('state', '=', '2')->count();
    $total_notification = $pending_notification + $accepted_notification + $rejected_notification;

    if($total_notification <= 0)
    {
      $total_notification = 1;
    }
    $email = Auth::user()->email;
    Mail::to($email)->send(new DemoMail());

    return view('erasmus.main_menu', [
      'notifications' => $notifications,
      'pending_notification' => $pending_notification,
      'accepted_notification' => $accepted_notification,
      'rejected_notification' => $rejected_notification,
      'total_notification' => $total_notification/100
    ]);
  }

  public function profile()
  {
    $user = Auth::user();

    if($user->type == 1 ){
      return redirect()->route('home');
    }

    return view('erasmus.profile');
  }


  public function update()
  {
    $user = Auth::user();

    if($user->type == 1 ){
      return redirect()->route('home');
    }

    $user->name = Request::get('erasmus_name');
    $user->phone_number = Request::get('erasmus_phone');
    $user->email = Request::get('erasmus_email');
    /* TODO: Verify the email (if it is unique as well) and validate the new inputs */

    $user->save();

    return redirect()->route('erasmus_update');
  }

}
