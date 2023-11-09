<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIPs = ['80.73.14.172', '127.0.0.1'];

        if (in_array($request->ip(), $allowedIPs)) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');

        // Або ви можете перенаправити на іншу сторінку:
        // return redirect()->route('home')->with('error', 'Unauthorized.');
        // Або ви можете виконати інші дії, які вам потрібні.
    }
}
