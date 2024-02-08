<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RootMiddleWare
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth()->user()['user_role_id'] !== 3) {
            return redirect('admin/');
        }

        return $next($request);
    }
}
