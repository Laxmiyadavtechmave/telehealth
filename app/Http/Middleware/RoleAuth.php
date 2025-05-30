<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $segment = $request->segment(1); // e.g., 'clinic' from /clinic/dashboard

        $validRoles = ['superadmin', 'clinic', 'doctor', 'patient', 'pharmacy'];

        $role = in_array($segment, $validRoles) ? $segment : 'superadmin';

        return redirect()->route('login', ['role' => $role]);
    }
}
