<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \App\Traits\BelongsToTenant;
    use HasFactory;

    // Defina aqui os campos que criamos para a vitrine da barbearia
    protected $fillable = [
        'name',
        'category',
        'price',
        'duration_minutes',
        'is_featured',
        'tenant_id',
    ];
}