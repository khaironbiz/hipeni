<?php

namespace App\Policies;

use App\Models\Education_type;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationTypePolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education_type  $educationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Education_type $educationType)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education_type  $educationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Education_type $educationType)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education_type  $educationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Education_type $educationType)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education_type  $educationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Education_type $educationType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education_type  $educationType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Education_type $educationType)
    {
        //
    }
}
