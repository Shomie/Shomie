<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Socialite;
use Auth;
use Illuminate\Support\Facades\Log;



class SocialAuthController extends Controller
{

    protected $redirectTo = '/home';

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where("email",$user->email)->first();
        $provider_id = $provider.'_id';
        if ($authUser) {
	    if(!$authUser->$provider_id){
		$authUser->update([$provider_id => $user->id]);
	    }
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            //'gender' => $user['gender'],
            $provider_id => $user->id
        ]);
    }

}
