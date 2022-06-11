<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserAuthorityByType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,...$types)
    {
        //only user with passed type can access this request
        foreach ($types as $type) {
            if(auth()->user()->typeIs($type)){
                return $next($request);
            }
        }
        abort(Response::HTTP_UNAUTHORIZED,'Cant Access This Page!');
    }
}
