<?php

namespace AndyJessop\Socialist\Repositories;

use Event;
use AndyJessop\Socialist\Models\User;
use AndyJessop\Socialist\Events\UserHasRegistered;

class UserRepository {

    public function findByEmailOrCreate($user, $provider)
    {
        // Find user by email
        if (! $user = User::where('email', $user->email)->first()) {

            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);

            Event::fire(new UserHasRegistered($user));
        }

        return $user;
    }
}
