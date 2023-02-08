<?php

namespace App\Policies;

use App\Models\Person;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        // Los coordinadores pueden acceder a todo
        if ($user->person()->first()->role_id === config('roles.COORDINADOR', -1)) {
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
        // Nadie excepto los coordinadores (función before)
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Person $person)
    {
        // Los coordinadores (función before) y sólo si la persona es el propio usuario

        if ($user->person()->first()->id == $person->id) {
            return true;
        }

        if ($person->role_id == config('roles.ALUMNO')) {
            // Si el alumno es estudiante del tutor
            $sheet = $person->studentSheets()->where('tutor_id', $user->person_id)->first();
            return !!$sheet;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // Nadie excepto los coordinadores (función before)
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Person $person)
    {
        // Los coordinadores (función before) y sólo si la persona es el propio usuario
        return $user->person()->first()->id === $person->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Person $person)
    {
        // Nadie excepto los coordinadores (función before)
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Person $person)
    {
        // Nadie excepto los coordinadores (función before)
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Person $person)
    {
        // Nadie excepto los coordinadores (función before)
        return false;
    }
}
