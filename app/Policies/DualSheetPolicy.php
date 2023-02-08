<?php

namespace App\Policies;

use App\Models\DualSheet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DualSheetPolicy
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
     * @param  \App\Models\DualSheet  $dualSheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DualSheet $dualSheet)
    {
        $personId = $user->person_id;

        return $dualSheet->student_id == $personId || $dualSheet->tutor_id == $personId;
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
     * @param  \App\Models\DualSheet  $dualSheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DualSheet $dualSheet)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DualSheet  $dualSheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DualSheet $dualSheet)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DualSheet  $dualSheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DualSheet $dualSheet)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DualSheet  $dualSheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DualSheet $dualSheet)
    {
        return false;
    }

    public function createDiaryEntries(User $user, DualSheet $dualSheet)
    {
        return $dualSheet->student_id == $user->person_id;
    }

    public function deleteDiaryEntries(User $user, DualSheet $dualSheet)
    {
        return false; // solo coordinadores
    }

    public function viewFollowUps(User $user, DualSheet $dualSheet)
    {
        return $dualSheet->tutor_id == $user->person_id;
    }
}
