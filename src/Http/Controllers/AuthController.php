<?php

namespace AndyJessop\Socialist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite as Socialite;

class AuthController extends Controller {

    public function login()
    {
        if (\Input::has('oauth_token'))
        {

        }
        return Socialite::driver('twitter')->redirect();
    }
}
