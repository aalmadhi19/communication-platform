<?php

namespace Modules\FacultyMember\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user->user_type == 'FacultyMember' || $user->user_type == 'Admin/FacultyMember'){
            return $next($request);
        }

        return redirect('/');

    }
}
