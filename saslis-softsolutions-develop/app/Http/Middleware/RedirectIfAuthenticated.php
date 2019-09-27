<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;

            case 'docente':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('docente.home');
                }
                break;

            case 'auxiliar':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('auxiliar.home');
                }
                break;

            case 'estudiante':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('estudiante.home');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }

        return $next($request);
    }
}
