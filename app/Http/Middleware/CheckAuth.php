<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckAuth
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
        if ($request->header('Authorization') === 'Bearer 00201008280777') {
            return $next($request);
        }

        return response()->json([
            'message' => 'You\'re Unauthorized To Call API',
            'result'  => ''
        ],401);

    }
}
