<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tenant;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Descobre o slug da barbearia através do parâmetro da rota
        $slug = $request->route('tenant_slug');

        $tenant = Tenant::where('slug', $slug)->first();

        if (!$tenant) {
            abort(404, 'Barbearia não encontrada.');
        }

        // Compartilha o tenant atual globalmente na requisição
        app()->instance(Tenant::class, $tenant);

        return $next($request);
    }
}
