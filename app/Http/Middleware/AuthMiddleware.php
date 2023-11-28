<?php

namespace App\Http\Middleware;

use App\Http\Helpers\AuthHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    // 'user','admin', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'

    public function handle(Request $request, Closure $next, $role): Response
    {

        $roles = new AuthHelper;

        switch ($role) {
            case 'all':
                if ($roles->allowRoles('front-desk', 'accountant', 'nurse', 'doctor', 'lab-scientist', 'pharmacy')) return $next($request);
                break;
            case 'admin':
                if ($roles->allowRoles('admin')) return $next($request);
                break;
            case 'front-desk':
                if ($roles->allowRoles('front-desk')) return $next($request);
                break;
            case 'accountant':
                if ($roles->allowRoles('accountant')) return $next($request);
                break;
            case 'nurse':
                if ($roles->allowRoles('nurse')) return $next($request);
                break;
            case 'doctor':
                if ($roles->allowRoles('doctor')) return $next($request);
                break;
            case 'lab-scientist':
                if ($roles->allowRoles('lab-scientist')) return $next($request);
                break;
            case 'user':
                if ($roles->allowRoles('user')) return $next($request);
                break;

            default:
                return back();
                break;
        }
    }
}
