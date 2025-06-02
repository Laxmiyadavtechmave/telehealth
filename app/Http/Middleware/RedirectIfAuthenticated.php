<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        // dd("sdfsdf");
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch ($guard) {
                    case 'clinic':
                        return redirect()->route('clinic.dashboard');
                    case 'web':
                        return redirect()->route('superadmin.dashboard');
                    case 'doctor':
                        return redirect()->route('doctor.dashboard');
                    // case 'patient':
                    //     return redirect()->route('patient.dashboard');
                    case 'pharmacy':
                        return redirect()->route('pharmacy.dashboard');
                    // default:
                    //     return redirect('/home');
                }
            }
        }

        return $next($request);
    }
}
