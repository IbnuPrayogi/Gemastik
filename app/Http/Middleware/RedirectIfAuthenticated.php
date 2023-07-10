<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->getRedirectPath($request));
            }
        }
        return $next($request);
    }
    protected function getRedirectPath(Request $request): string
    {
        if ($request->user()->id_role==11) {
            return RouteServiceProvider::ADMIN;
        } elseif ($request->user()->id_roles==99) {
            return RouteServiceProvider::CLIENT;
        } else {
            return RouteServiceProvider::HOME;
        }
    }
}
