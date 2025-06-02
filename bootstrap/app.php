<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\{NoCacheHeader, RedirectIfAuthenticated, RoleAuth};
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(web: __DIR__ . '/../routes/web.php', commands: __DIR__ . '/../routes/console.php', health: '/up')
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth_redirect' => RedirectIfAuthenticated::class,
        ]);
        $middleware->append(NoCacheHeader::class);
        $middleware->redirectGuestsTo(function (Request $request) {
            $segment = $request->segment(1);
            if ($segment === 'superadmin') {
                return route('superadmin.login');
            } elseif ($segment === 'clinic') {
                return route('clinic.login');
            } elseif ($segment === 'doctor') {
                return route('doctor.login');
            } elseif ($segment === 'pharmacy') {
                return route('pharmacy.login');
            }
            // Fallback route if no segment matches
            return route('superadmin.login'); // Or any default login route
        });
   
    })
    ->withExceptions(function (Exceptions $exceptions) {})
    ->create();
