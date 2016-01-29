<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $parameter)
    {
        return $next($request);
    }

    /*
     * Do some work after the HTTP response has already been sent to the browser.
     */
    public function terminate($request, $response)
    {
        // Do something
    }
}
