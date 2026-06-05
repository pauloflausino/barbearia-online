<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Define a página de agendamento/boas-vindas como a página inicial
Route::get('/', function (Request $request) {
    if ($request->has('tenant_slug')) {
        return redirect()->route('booking.index', ['tenant_slug' => $request->query('tenant_slug')]);
    }
    
    // Se não tiver parâmetro nenhum, você pode retornar uma view padrão ou o que desejar
    return app(HomeController::class)->index();
    //return response('Bem-vindo à plataforma de Barbearias! Acesse /b/{nome-da-barbearia}');
});

//Route::post('/agendar', [AppointmentController::class, 'store'])->name('booking.store');

Route::get('/landing', function () {
    return view('landing');
});

// Painel Rápido de Cadastro (Admin)
Route::get('/admin/cadastro', [AppointmentController::class, 'adminPage'])->name('admin.cadastro');
Route::post('/admin/servico', [AppointmentController::class, 'storeService'])->name('service.store');
Route::post('/admin/profissional', [AppointmentController::class, 'storeProfessional'])->name('professional.store');
// 2. Rotas do Booking de cada Barbearia (Acessado em barbersaas.test/b/barbearia-do-rodrigo)
Route::middleware(['tenant'])->prefix('b/{tenant_slug}')->group(function () {
    
    // A listagem abaixo vai mostrar APENAS os serviços e barbeiros dessa barbearia específica!
    Route::get('/', [AppointmentController::class, 'index'])->name('booking.index');
    // 💾 POST - Salva o agendamento na mesma URL (Ex: /b/navalha-de-ouro)
    Route::post('/', [AppointmentController::class, 'store'])->name('booking.store');

    Route::post('/agendar', [AppointmentController::class, 'store'])->name('booking.store');
    
    Route::get('/dashboard', [AppointmentController::class, 'dashboard'])->name('tenant.dashboard');

    // 🔑 1. ROTAS DE AUTENTICAÇÃO (Acessíveis mesmo deslogado)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('tenant.login');
    Route::post('/login', [AuthController::class, 'login'])->name('tenant.login.submit');



});

Route::middleware(['auth', 'tenant'])->prefix('b/{tenant_slug}')->group(function () {
    
    Route::get('/trail', [AppointmentController::class, 'trail'])->name('booking.trail'); 
    Route::post('/trail', [AppointmentController::class, 'store'])->name('booking.store');
    
});

