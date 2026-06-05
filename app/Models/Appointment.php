<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToTenant; // Se você estiver usando a Trait aqui

class Appointment extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'professional_id',
        'service_id',
        'start_time',
        'end_time',
        'status',
    ];

    // 📍 ADICIONE ESTE RELACIONAMENTO AQUI!
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Garanta também que os outros dois relacionamentos existam:
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
}