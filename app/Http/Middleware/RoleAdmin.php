<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('user_role') !== 'Admin') {
            abort(403, 'Anda tidak memiliki akses untuk melakukan tindakan ini.');
        }

        return $next($request);
    }
}