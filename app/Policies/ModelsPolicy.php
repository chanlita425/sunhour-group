<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Models; // Adjust namespace if necessary
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelsPolicy
{
    use HandlesAuthorization;

    /**
     * Allow admins to bypass all checks.
     */
    public function before(User $user)
    {
        if ($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine if the user can create a model.
     */
    public function create(User $user)
    {
        return $user->role === 'admin' ;
    }

    /**
     * Determine if the user can update a model.
     */
    public function update(User $user, Models $model)
    {
        return  $user->role === 'admin';
    }

    /**
     * Determine if the user can delete a model.
     */
    public function delete(User $user, Models $model)
    {
        return $user->role === 'admin';
    }
}
