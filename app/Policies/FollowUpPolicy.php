<?php

namespace App\Policies;

use App\Models\FollowUp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowUpPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->person->role_id == config('roles.COORDINADOR')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FollowUp $followUp)
    {
        return $followUp->dualSheet->tutor_id == $user->person_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FollowUp $followUp)
    {
        return $followUp->dualSheet->tutor_id == $user->person_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FollowUp $followUp)
    {
        return $followUp->dualSheet->tutor_id == $user->person_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FollowUp $followUp)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FollowUp $followUp)
    {
        return false;
    }
}
