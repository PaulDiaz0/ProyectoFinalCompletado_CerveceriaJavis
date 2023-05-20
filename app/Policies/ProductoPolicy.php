<?php

namespace App\Policies;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductoPolicy
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Producto $producto)
    {

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
                : Response::deny('Necesitas ser administrador para crear producto'); 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Producto $producto)
    {
        return $user->id == 3  
        ? Response::allow()
        : Response::deny('Necesitas ser administrador para subir producto'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Producto $producto)
    {
        return $user->id == 3  
                ? Response::allow()
                : Response::deny('Necesitas ser administrador para borrar producto');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Producto $producto)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Producto $producto)
    {
        //
    }
}