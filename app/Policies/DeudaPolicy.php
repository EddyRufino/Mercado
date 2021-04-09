<?php

namespace App\Policies;

use App\User;
use App\Deuda;
use App\Puesto;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeudaPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability) {

      if ($user->hasRoles(['admin', 'cobrador'])) {

        return true;
      }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Puesto $puesto)
    {
        return $user->id === $puesto->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deuda  $deuda
     * @return mixed
     */
    public function update(User $user, Deuda $deuda)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deuda  $deuda
     * @return mixed
     */
    public function delete(User $user, Deuda $deuda)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deuda  $deuda
     * @return mixed
     */
    public function restore(User $user, Deuda $deuda)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Deuda  $deuda
     * @return mixed
     */
    public function forceDelete(User $user, Deuda $deuda)
    {
        //
    }
}
