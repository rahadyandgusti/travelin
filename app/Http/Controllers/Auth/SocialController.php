<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersModel as User;
use App\Models\SocialModel as Social;


use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    
    public function getSocialRedirect( $provider )
    {

        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {

            return redirect()->to('/')
                ->with('error','No such provider');

        }

        if($provider == 'google'){
            return Socialite::driver( $provider )
                ->setScopes(["https://www.googleapis.com/auth/plus.login",
                       "https://www.googleapis.com/auth/plus.me",
                       "https://www.googleapis.com/auth/plus.profile.emails.read"])
                ->with(['access_type' => 'online'])
                ->redirect();
        } else {
            return Socialite::driver( $provider )
                ->setScopes(["email", "public_profile", "user_friends"])
                ->redirect();
        }

    }

    public function getSocialHandle( $provider )
    {

        if (Input::get('denied') != '') {

            return redirect()->to('/')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');

        }

        $user = Socialite::driver( $provider )->user();

        $socialUser = null;

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();

        $email = $user->email;

        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }

        if (!empty($userCheck)) {

            $socialUser = $userCheck;

        }
        else {
            $sameSocialId = Social::where('social_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();

            if (empty($sameSocialId)) {

                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email = $email;

                $newSocialUser->name = $user->name;

                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->remember_token = str_random(64);
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                $socialUser = $newSocialUser;

            }
            else {

                //Load this existing social user
                $socialUser = $sameSocialId->user;

            }

        }

        auth()->login($socialUser, true);

        return redirect()->to('/new');
    }
}
