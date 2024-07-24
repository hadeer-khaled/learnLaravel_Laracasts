<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Job;

class JobPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function edit(User $user , Job $job){
        return $job->employer->user_id === strval($user->id);

    }
}
