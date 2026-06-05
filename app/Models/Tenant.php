<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'slug',
        'domain',
    ];

    /**
     * Uma barbearia (tenant) possui muitos usuários (administradores e clientes).
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Uma barbearia (tenant) possui muitos serviços na sua vitrine.
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Uma barbearia (tenant) possui muitos profissionais (barbeiros).
     */
    public function professionals(): HasMany
    {
        return $this->hasMany(Professional::class);
    }

    /**
     * Uma barbearia (tenant) possui muitos agendamentos na agenda.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}