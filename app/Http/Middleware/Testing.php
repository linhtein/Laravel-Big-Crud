<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Testing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $acceptedUser = [11,12];
        // if(in_array(Auth::id(),$acceptedUser)){
        //     return $next($request);
        // }
        // return abort(404);

        if(Auth::user()->isAdmin()){
            return $next($request);
        }
        return abort(403,'U are not allowed');


        
    }
}
