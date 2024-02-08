<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() === null || auth()->user()['user_role_id'] < 2) {
            return redirect('home');
        }

        return $next($request);
    }
}
