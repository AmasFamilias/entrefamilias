<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Agregar rate limiting a rutas de autenticación
        $middleware->alias([
            'throttle.login' => \Illuminate\Routing\Middleware\ThrottleRequests::class . ':5,1',
            'throttle.register' => \Illuminate\Routing\Middleware\ThrottleRequests::class . ':3,1',
            'throttle.password' => \Illuminate\Routing\Middleware\ThrottleRequests::class . ':5,1',
            'throttle.uploads' => \Illuminate\Routing\Middleware\ThrottleRequests::class . ':20,1', // 20 subidas por minuto
        ]);
        
        // Agregar headers de seguridad globalmente
        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
