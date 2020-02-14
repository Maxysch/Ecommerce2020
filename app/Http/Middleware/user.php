<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()!=null){
            return $next($request);
        }
        else{
            return redirect ('/register');
        }
    }
}
