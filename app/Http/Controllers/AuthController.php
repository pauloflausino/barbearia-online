<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibe a tela de login
    public function showLogin($tenant_slug)
    {
        return view('auth.login');
    }

    // Processa a tentativa de login
    public function login(Request $request, $tenant_slug)
    {
        // Valida o formato dos dados enviados
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        // Tenta realizar a autenticação
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Login feito com sucesso! Redireciona o usuário direto para o fluxo de agendamento do tenant atual
            return redirect()->route('booking.index', ['tenant_slug' => $tenant_slug])
                ->with('success', 'Bem-vindo de volta!');
        }

        // Caso dê errado, retorna preenchendo o e-mail antigo e exibindo erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }
}