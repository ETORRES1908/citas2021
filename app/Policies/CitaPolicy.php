<?php

namespace App\Policies;

use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CitaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function AtenderCita(User $user, Schedule $schedule)
    {
        if ($user->id == $schedule->doctor->user_id) {
            return true;
        } else{
            return false;
        }
    }
}
