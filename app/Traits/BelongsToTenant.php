<?php
namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        // 1. Sempre filtra as consultas pelo Tenant ativo
        static::addGlobalScope('tenant', function (Builder $builder) {
            if (app()->bound(Tenant::class)) {
                $builder->where('tenant_id', app(Tenant::class)->id);
            }
        });

        // 2. Sempre preenche o tenant_id automaticamente ao criar um dado
        static::creating(function ($model) {
            if (app()->bound(Tenant::class)) {
                $model->tenant_id = app(Tenant::class)->id;
            }
        });
    }
}