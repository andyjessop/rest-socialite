<?php

namespace AndyJessop\Socialist;

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use AndyJessop\Socialist\Repositories\UserRepository;
use Illuminate\Http\Request;

class AuthenticateUser {

    private $socialite;
    private $auth;
    private $users;

    public function __construct(Socialite $socialite, Guard $auth, UserRepository $users)
    {
        $this->socialite = $socialite;
        $this->auth = $auth;
        $this->users = $users;
    }

    public function execute($hasCode, $provider)
    {
        if ( ! $hasCode) return $this->getAuthorizationFirst($provider);

        $user = $this->users->findByEmailOrCreate($this->getUser($provider), $provider);

        $this->auth->login($user, true);

        return $user;
    }

    private function getAuthorizationFirst($provider)
    {
        return $this->socialite->driver($provider)->redirect();
    }

    private function getUser($provider)
    {
        return $this->socialite->driver($provider)->user();
    }
}
