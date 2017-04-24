<?php

namespace App\Http\Middleware;

use Closure;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** Check if the user is already authenticated */
        if ($request->session()->get('usuario_id', '') == '') {
            return redirect('/login');
        }

        return $next($request);
    }
}
