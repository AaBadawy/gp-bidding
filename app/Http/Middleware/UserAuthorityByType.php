<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuthorityByType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $type)
    {
        //only user with passed type can access this request
        if(auth()->user()->typeIs($type))
            return $next($request);
        abort(401,'Cant Access This Page!');
    }
}
