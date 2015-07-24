<?php

namespace AndyJessop\Socialist\Events;

use App\Podcast;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use AndyJessop\Socialist\Models\User;

class UserHasRegistered extends Event
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
