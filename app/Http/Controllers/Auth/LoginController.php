<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /*
  * Login Authentication without socialite
  *
  */

  public function postLogin(Request $request){

    if (Auth::attempt(
      [
        'email' => $request->email,
        'password' => $request->password,
        'active' => 1
      ]
      , $request->has('remember')

    )){
      return redirect()->intended($this->redirectPath());
    }
    else{
      $rules = [
        'email' => 'required|email',
        'password' => 'required',
      ];

      $messages = [
        'email.required' => 'Required Field',
        'email.email' => 'Insert a valid email',
        'password.required' => 'Required Field',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      return redirect('auth/login')
      ->withErrors($validator)
      ->withInput()
      ->with('message', 'Error Authenticating');
    }
  }

}
