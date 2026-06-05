<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Barbearia Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased font-sans">

    <div class="bg-linear-to-b from-slate-900 to-slate-950 py-12 px-4 border-b border-slate-800 text-center">
        <span class="text-4xl block mb-2">💈</span>
        <h1 class="text-3xl font-black tracking-tight text-amber-500 uppercase">Bem-vindo à Barbearia</h1>
        <p class="text-slate-400 text-sm mt-1 max-w-md mx-auto">Escolha o serviço, o barbeiro de preferência e o melhor horário para você.</p>
    </div>

    <main class="max-w-xl mx-auto px-4 py-10">

        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-4 rounded-xl mb-6 text-sm font-medium">
                🎉 {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-rose-500/10 border border-rose-500/30 text-rose-400 p-4 rounded-xl mb-6 text-sm font-medium">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('booking.store', ['tenant_slug' => request()->route('tenant_slug')]) }}" method="POST" class="space-y-6">
            @csrf

            <div id="step-1" class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl transition-all">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-7 h-7 rounded-full bg-amber-500 text-slate-950 flex items-center justify-center font-bold text-sm">1</span>
                    <h2 class="text-lg font-bold text-white">Qual serviço deseja realizar?</h2>
                </div>
                
                <select name="service_id" id="service_select" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-300 focus:outline-none focus:border-amber-500 transition cursor-pointer">
                    <option value="" disabled selected>Selecione um serviço...</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name }} (R$ {{ number_format($service->price, 2, ',', '.') }}) — {{ $service->duration_minutes }} min
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="step-2" class="bg-slate-900 border border-slate-800/40 p-6 rounded-2xl shadow-xl opacity-40 pointer-events-none transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-7 h-7 rounded-full bg-slate-800 text-slate-400 flex items-center justify-center font-bold text-sm" id="badge-step-2">2</span>
                    <h2 class="text-lg font-bold text-slate-400" id="title-step-2">Quem vai te atender?</h2>
                </div>
                
                <select name="professional_id" id="professional_select" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-300 focus:outline-none focus:border-amber-500 transition cursor-pointer">
                    <option value="" disabled selected>Selecione o barbeiro...</option>
                    @foreach($professionals as $professional)
                        <option value="{{ $professional->id }}">🧔 {{ $professional->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="step-3" class="bg-slate-900 border border-slate-800/40 p-6 rounded-2xl shadow-xl opacity-40 pointer-events-none transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-7 h-7 rounded-full bg-slate-800 text-slate-400 flex items-center justify-center font-bold text-sm" id="badge-step-3">3</span>
                    <h2 class="text-lg font-bold text-slate-400" id="title-step-3">Escolha a data e o horário</h2>
                </div>
                
                <input type="datetime-local" name="start_time" id="time_input" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-slate-300 focus:outline-none focus:border-amber-500 transition cursor-pointer color-scheme-dark">
            </div>

            <div id="step-4" class="bg-slate-900 border border-slate-800/40 p-6 rounded-2xl shadow-xl opacity-40 pointer-events-none transition-all duration-300">
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-7 h-7 rounded-full bg-slate-800 text-slate-400 flex items-center justify-center font-bold text-sm" id="badge-step-4">4</span>
                    <h2 class="text-lg font-bold text-slate-400" id="title-step-4">Confirmar Seus Dados</h2>
                </div>
                
                <div class="bg-slate-950 p-4 rounded-xl border border-slate-800/60 text-sm space-y-2 text-slate-400">
                    <p><strong>Cliente:</strong> <span class="text-slate-200">{{ auth()->user()?->name ?? 'Visitante não logado' }}</span></p>
                    <p><strong>WhatsApp:</strong> <span class="text-slate-200">{{ auth()->user()?->phone ?? 'Não cadastrado' }}</span></p>
                    <p><strong>E-mail:</strong> <span class="text-slate-200">{{ auth()->user()?->email ?? 'N/A' }}</span></p>
                </div>
            </div>

            <button type="submit" id="submit_btn" class="w-full bg-slate-800 text-slate-500 font-bold py-4 rounded-xl transition cursor-not-allowed uppercase tracking-wider text-sm shadow-lg" disabled>
                Confirmar Agendamento 💈
            </button>
        </form>
    </main>

    <script>
        const serviceSelect = document.getElementById('service_select');
        const professionalSelect = document.getElementById('professional_select');
        const timeInput = document.getElementById('time_input');

        const step2 = document.getElementById('step-2');
        const badge2 = document.getElementById('badge-step-2');
        const title2 = document.getElementById('title-step-2');

        const step3 = document.getElementById('step-3');
        const badge3 = document.getElementById('badge-step-3');
        const title3 = document.getElementById('title-step-3');

        const submitBtn = document.getElementById('submit_btn');

        // Monitora Passo 1 -> Libera Passo 2
        serviceSelect.addEventListener('change', () => {
            if(serviceSelect.value) {
                step2.classList.remove('opacity-40', 'pointer-events-none');
                step2.classList.add('border-slate-800');
                badge2.classList.remove('bg-slate-800', 'text-slate-400');
                badge2.classList.add('bg-amber-500', 'text-slate-950');
                title2.classList.remove('text-slate-400');
                title2.classList.add('text-white');
            }
        });

        // Monitora Passo 2 -> Libera Passo 3
        professionalSelect.addEventListener('change', () => {
            if(professionalSelect.value) {
                step3.classList.remove('opacity-40', 'pointer-events-none');
                step3.classList.add('border-slate-800');
                badge3.classList.remove('bg-slate-800', 'text-slate-400');
                badge3.classList.add('bg-amber-500', 'text-slate-950');
                title3.classList.remove('text-slate-400');
                title3.classList.add('text-white');
            }
        });

        // Monitora Passo 3 -> Ativa Botão Final de Confirmação
        timeInput.addEventListener('change', () => {
            if(timeInput.value) {
                submitBtn.removeAttribute('disabled');
                submitBtn.classList.remove('bg-slate-800', 'text-slate-500', 'cursor-not-allowed');
                submitBtn.classList.add('bg-amber-500', 'text-slate-950', 'hover:bg-amber-400', 'cursor-pointer');
            } else {
                submitBtn.setAttribute('disabled', 'true');
                submitBtn.classList.add('bg-slate-800', 'text-slate-500', 'cursor-not-allowed');
                submitBtn.classList.remove('bg-amber-500', 'text-slate-950', 'hover:bg-amber-400', 'cursor-pointer');
            }
        });


        const serviceSelect = document.getElementById('service_select');
        const professionalSelect = document.getElementById('professional_select');
        const timeInput = document.getElementById('time_input');

        const step2 = document.getElementById('step-2');
        const badge2 = document.getElementById('badge-step-2');
        const title2 = document.getElementById('title-step-2');

        const step3 = document.getElementById('step-3');
        const badge3 = document.getElementById('badge-step-3');
        const title3 = document.getElementById('title-step-3');

        const step4 = document.getElementById('step-4');
        const badge4 = document.getElementById('badge-step-4');
        const title4 = document.getElementById('title-step-4');

        const submitBtn = document.getElementById('submit_btn');

        // Passo 1 -> Passo 2
        serviceSelect.addEventListener('change', () => {
            if(serviceSelect.value) {
                step2.classList.remove('opacity-40', 'pointer-events-none');
                badge2.classList.replace('bg-slate-800', 'bg-amber-500');
                badge2.classList.replace('text-slate-400', 'text-slate-950');
                title2.classList.replace('text-slate-400', 'text-white');
            }
        });

        // Passo 2 -> Passo 3
        professionalSelect.addEventListener('change', () => {
            if(professionalSelect.value) {
                step3.classList.remove('opacity-40', 'pointer-events-none');
                badge3.classList.replace('bg-slate-800', 'bg-amber-500');
                badge3.classList.replace('text-slate-400', 'text-slate-950');
                title3.classList.replace('text-slate-400', 'text-white');
            }
        });

        // Passo 3 -> Libera o Passo 4 e Ativa o Botão de Envio
        timeInput.addEventListener('change', () => {
            if(timeInput.value) {
                step4.classList.remove('opacity-40', 'pointer-events-none');
                badge4.classList.replace('bg-slate-800', 'bg-amber-500');
                badge4.classList.replace('text-slate-400', 'text-slate-950');
                title4.classList.replace('text-slate-400', 'text-white');

                submitBtn.removeAttribute('disabled');
                submitBtn.classList.remove('bg-slate-800', 'text-slate-500', 'cursor-not-allowed');
                submitBtn.classList.add('bg-amber-500', 'text-slate-950', 'hover:bg-amber-400', 'cursor-pointer');
            } else {
                step4.classList.add('opacity-40', 'pointer-events-none');
                submitBtn.setAttribute('disabled', 'true');
                submitBtn.classList.replace('bg-amber-500', 'bg-slate-800');
            }
        });

    </script>

    <style>
        /* Ajuste para o calendário do HTML5 ficar escuro e harmonioso */
        .color-scheme-dark {
            color-scheme: dark;
        }
    </style>
</body>
</html>