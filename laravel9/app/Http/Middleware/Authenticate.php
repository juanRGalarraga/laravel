<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return response()->json([
    //             'name' => 'Abigail',
    //             'state' => 'CA',
    //         ]);
    //         // return response(['data' => 'Unauthorized'])
    //         //         ->header('Content-Type', 'aplication/json');
    //     }
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        if (! $request->expectsJson()) {
            return response()->json(['data' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
