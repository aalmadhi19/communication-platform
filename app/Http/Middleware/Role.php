<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;


class Role
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, String $user_type) {

        $user = Auth::user();
        if($user->user_type == $user_type){
            return $next($request);
        }

        return redirect('/login');
      }
}
