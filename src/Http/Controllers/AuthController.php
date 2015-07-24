<?php

namespace AndyJessop\Socialist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use AndyJessop\Socialist\AuthenticateUser;

class AuthController extends Controller {

    public function login($provider, AuthenticateUser $authenticateUser, Request $request)
    {
        $user = $authenticateUser->execute($request->has('code'), $provider);
        // Fire event: user has logged in
    }
}
