<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClinicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(ROLE_ADMIN);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Clinic $clinic)
    {
        return $user->hasRole(ROLE_ADMIN);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole(ROLE_ADMIN);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Clinic $clinic)
    {
        return $user->hasRole(ROLE_ADMIN);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Clinic  $clinic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Clinic $clinic)
    {
        return $user->hasRole(ROLE_ADMIN);
    }
}
