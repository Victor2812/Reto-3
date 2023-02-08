<?php

namespace App\Policies;

use App\Models\JobEvaluation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobEvaluationPolicy
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
     * @param  \App\Models\JobEvaluation  $jobEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, JobEvaluation $jobEvaluation)
    {
        $personId = $user->person_id;
        $sheet = $jobEvaluation->dualSheet;

        return $sheet->student_id == $personId || $sheet->tutor_id == $personId;
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
     * @param  \App\Models\JobEvaluation  $jobEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, JobEvaluation $jobEvaluation)
    {
        $personId = $user->person_id;
        $sheet = $jobEvaluation->dualSheet;

        return $sheet->tutor_id == $personId;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JobEvaluation  $jobEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, JobEvaluation $jobEvaluation)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JobEvaluation  $jobEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, JobEvaluation $jobEvaluation)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JobEvaluation  $jobEvaluation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, JobEvaluation $jobEvaluation)
    {
        return false;
    }
}
