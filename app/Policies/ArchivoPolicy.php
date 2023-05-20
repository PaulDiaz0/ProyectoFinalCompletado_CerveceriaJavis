<?php

namespace App\Policies;

use App\Models\Archivo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArchivoPolicy
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
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Archivo $archivo)
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
        return $user->id == 3  //condicion
        ? Response::allow()
        : Response::deny('Necesitas ser administrador para crear archivo'); 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Archivo $archivo)
    {
        return $user->id == 3 
        ? Response::allow()
        : Response::deny('Necesitas ser administrador para subir archivo'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Archivo $archivo)
    {
        return $user->id == 3  
        ? Response::allow()
        : Response::deny('Necesitas ser administrador para borrar archivo');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Archivo $archivo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Archivo $archivo)
    {
        //
    }
}