<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Service;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BarbeariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Criar as Barbearias (Tenants) Primeiro
        $tenantAlpha = Tenant::updateOrCreate(
            ['slug' => 'navalha-de-ouro'],
            ['name' => 'Navalha de Ouro']
        );

        $tenantBeta = Tenant::updateOrCreate(
            ['slug' => 'barba-bigode'],
            ['name' => 'Barba & Bigode']
        );

        // ----------------------------------------------------
        // POPULANDO A BARBEARIA ALPHA (Navalha de Ouro)
        // ----------------------------------------------------
        
        // Vinculamos o primeiro usuário administrador à Barbearia Alpha
        User::updateOrCreate(
            ['email' => 'alpha@barbearia.com'],
            [
                'tenant_id' => $tenantAlpha->id, // 📍 Forçando o ID da barbearia
                'name' => 'Gerente Alpha',
                'password' => Hash::make('password'),
            ]
        );

        // Vinculamos os serviços à Barbearia Alpha
        Service::create([
            'tenant_id' => $tenantAlpha->id,
            'name' => 'Corte Degradê',
            'category' => 'Cabelo',
            'price' => 50.00,
            'duration_minutes' => 35,
            'is_featured' => true
        ]);

        // Vinculamos o barbeiro à Barbearia Alpha
        Professional::create([
            'tenant_id' => $tenantAlpha->id,
            'name' => 'Igor da Alpha',
            'specialty' => 'Especialista em Degradê',
            'commission_rate' => 50.00,
            'working_hours' => ['segunda' => '09:00-18:00']
        ]);


        // ----------------------------------------------------
        // POPULANDO A BARBEARIA BETA (Barba & Bigode)
        // ----------------------------------------------------
        
        // Vinculamos o usuário administrador à Barbearia Beta
        User::updateOrCreate(
            ['email' => 'beta@barbearia.com'],
            [
                'tenant_id' => $tenantBeta->id, // 📍 Forçando o ID da barbearia
                'name' => 'Gerente Beta',
                'password' => Hash::make('password'),
            ]
        );

        // Vinculamos os serviços à Barbearia Beta
        Service::create([
            'tenant_id' => $tenantBeta->id,
            'name' => 'Barba Premium com Toalha Quente',
            'category' => 'Barba',
            'price' => 40.00,
            'duration_minutes' => 30,
            'is_featured' => true
        ]);

        // Vinculamos o barbeiro à Barbearia Beta
        Professional::create([
            'tenant_id' => $tenantBeta->id,
            'name' => 'Cleiton da Barba',
            'specialty' => 'Mestre Barbudão',
            'commission_rate' => 45.00,
            'working_hours' => ['terca' => '09:00-18:00']
        ]);
    }
}