<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    use \App\Traits\BelongsToTenant;

    // Campos que refletem os recursos de profissionais e comissões
    protected $fillable = [
        'name',
        'avatar',
        'specialty',
        'commission_rate',
        'working_hours',
        'tenant_id',
    ];

    // Como o 'working_hours' foi planejado como JSON, dizemos ao Laravel para convertê-lo em array automaticamente
    protected $casts = [
        'working_hours' => 'array',
    ];

    // Relacionamento: Um profissional tem muitos agendamentos
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}