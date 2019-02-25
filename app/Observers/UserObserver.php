<?php

namespace App\Observers;


use App\User;

class UserObserver
{

    /**
     * @param User $user
     */
    public function creating(User $user)
    {
        $user->name = strip_tags($user->name);
        $user->first_name = strip_tags($user->first_name);
        $user->last_name = strip_tags($user->last_name);
        $user->email = strip_tags($user->email);
        $user->localisation = strip_tags($user->localisation);
        $user->description = strip_tags($user->description);
    }

    /**
     * @param User $user
     */
    public function updating(User $user)
    {
        $user->name = strip_tags($user->name);
        $user->first_name = strip_tags($user->first_name);
        $user->last_name = strip_tags($user->last_name);
        $user->email = strip_tags($user->email);
        $user->localisation = strip_tags($user->localisation);
        $user->description = strip_tags($user->description);
    }

}