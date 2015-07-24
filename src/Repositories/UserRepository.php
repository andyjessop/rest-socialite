<?php

namespace AndyJessop\Socialist\Repositories;

use AndyJessop\Socialist\Models\User;

class UserRepository {

    public function findByEmailOrCreate($user, $provider)
    {
        return User::firstOrCreate([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
