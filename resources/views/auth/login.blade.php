<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar - Barbearia Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased font-sans flex min-h-screen flex-col justify-center py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto w-full max-w-md text-center">
        <span class="text-5xl block mb-2">💈</span>
        <h2 class="text-3xl font-black tracking-tight text-white uppercase">Acesse sua Conta</h2>
        <p class="mt-2 text-sm text-slate-400">
            Faça login para gerenciar e confirmar seus agendamentos.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto w-full max-w-md">
        <div class="bg-slate-900 border border-slate-800 py-8 px-4 shadow-2xl rounded-2xl sm:px-10">
            
            @if($errors->any())
                <div class="bg-rose-500/10 border border-rose-500/30 text-rose-400 p-4 rounded-xl mb-6 text-sm font-medium">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>⚠️ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tenant.login.submit', ['tenant_slug' => request()->route('tenant_slug')]) }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wide text-slate-400">E-mail</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                            class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-300 placeholder-slate-600 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wide text-slate-400">Senha</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-300 placeholder-slate-600 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="h-4 w-4 rounded border-slate-800 bg-slate-950 text-amber-500 focus:ring-amber-500 focus:ring-offset-slate-900">
                        <label for="remember" class="ml-2 block text-sm text-slate-400 cursor-pointer select-none">Lembrar de mim</label>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="w-full flex justify-center bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold py-3.5 px-4 rounded-xl transition uppercase tracking-wider text-sm shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 focus:ring-offset-slate-900">
                        Entrar na Agenda 🚀
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>