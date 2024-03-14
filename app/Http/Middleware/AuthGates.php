<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\ManagementAccess\Role;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Middleware spatie custom

        //Get all user by session user
        $user = \Auth::user();

        //checking validation middleware
        //System on or not
        //User active or not
        if(!app()->runningInConsole() && $user){
            $roles              = Role::with('permission')->get();
            $permissionsArray   = [];

            //nested loop
            //looping for role (where table role)
            foreach($roles as $role){
                //looping for permission (where table permission role)
                foreach($role->permission as $permisions){
                    $permissionsArray[$permisions->title][] = $role->id;
                }
            }

            //Check user role
            foreach($permissionsArray as $title =>$roles){
                Gate::define($title, function (\App\Models\User $user)
                use ($roles){
                    return count(array_intersect($user->role->pluck('id')
                    ->toArray(), $roles)) > 0;
                });
            }
        }
        //return all middleware
        return $next($request);
    }
}
