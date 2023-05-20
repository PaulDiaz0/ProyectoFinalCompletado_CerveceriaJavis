<?php

namespace App\Policies;

use App\Models\ProductoUbicacion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductoUbicacionPolicy
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
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProductoUbicacion $productoUbicacion)
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
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductoUbicacion $productoUbicacion)
    {
        return $user->id == 3  //condicion
        ? Response::allow()
        : Response::deny('Necesitas ser adminstrador para subir la ubicacion del producto'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductoUbicacion $productoUbicacion)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductoUbicacion $productoUbicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductoUbicacion $productoUbicacion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductoUbicacion  $productoUbicacion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductoUbicacion $productoUbicacion)
    {
        //
    }
}