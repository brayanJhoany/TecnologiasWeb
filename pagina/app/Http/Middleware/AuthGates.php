<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        //$user = \Auth::user();
        //check  determina si el usuario ya inicio sesion en el sistema,
        //regresa true si el usuario esta autenticado
        if (auth()->check()) {
            //estamos adjuntando los permissions a los roles
            $roles= Role::with('permissions')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function ($user) use ($roles) {
                    //array_intersect hace una interseccion de dos listas, y genera una nueva
                    // con los valores que aparecen en las dos.
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
