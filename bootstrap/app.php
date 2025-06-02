<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\{NoCacheHeader, RedirectIfAuthenticated,RoleAuth};
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(web: __DIR__ . '/../routes/web.php', commands: __DIR__ . '/../routes/console.php', health: '/up')
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth_redirect' => RedirectIfAuthenticated::class
        ]);
        $middleware->append([NoCacheHeader::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
    
    })
    ->create();
