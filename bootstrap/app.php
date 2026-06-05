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
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function ($request) {
        // Tenta capturar o slug tanto se vier como parâmetro de rota ou pela URL (/b/slug/...)
        $tenantSlug = $request->route('tenant_slug') ?? $request->segment(2);

        if ($tenantSlug) {
            return route('tenant.login', ['tenant_slug' => $tenantSlug]);
        }

        return '/'; // Fallback caso aceda a algo fora de um tenant
        });
    })

       
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
