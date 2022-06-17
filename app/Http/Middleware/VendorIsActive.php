<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VendorIsActive
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
        if(auth()->check() && auth()->user()->vendor()->exists() && auth()->user()->vendor?->status == 'inactivate'){
            foreach (auth()->user()->vendor->employees as $employee) {
                $employee->update(['status' => 'inactive']);
            }
            abort(403,'your vendor is inactive anymore');
        }
        return $next($request);
    }
}
