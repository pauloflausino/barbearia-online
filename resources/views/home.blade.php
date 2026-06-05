<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Online - Encontre e Agende Seu Horário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased font-sans">

    <!-- Hero Section -->
    <header class="relative overflow-hidden bg-gradient-to-b from-slate-900 via-slate-950 to-slate-950 py-24 px-6 border-b border-slate-900">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(245,158,11,0.08),transparent_45%)]"></div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10 space-y-6">
            <span class="text-6xl animate-bounce inline-block mb-2">💈</span>
            <h1 class="text-4xl md:text-6xl font-black tracking-tight text-white uppercase">
                O Estilo que Você Procura, <br>
                <span class="text-amber-500">No Horário que Você Precisa</span>
            </h1>
            <p class="text-slate-400 text-base md:text-lg max-w-2xl mx-auto font-medium">
                Sua plataforma definitiva para encontrar as melhores barbearias da região. Escolha o seu barbeiro favorito, o serviço ideal e agende em poucos segundos.
            </p>

            <!-- Barra de Busca Interativa -->
            <div class="max-w-md mx-auto pt-4">
                <div class="relative rounded-2xl shadow-xl border border-slate-800 bg-slate-900/60 backdrop-blur-md p-2 flex items-center">
                    <span class="pl-3 text-xl">🔍</span>
                    <input type="text" id="search_input" placeholder="Digite o nome da barbearia..." 
                        class="w-full bg-transparent px-3 py-3 text-slate-200 placeholder-slate-500 focus:outline-none text-sm font-medium">
                </div>
            </div>
        </div>
    </header>

    <!-- Seção de Unidades/Tenants -->
    <main class="max-w-6xl mx-auto px-6 py-16 space-y-10">
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-black uppercase text-white tracking-wide">Nossos Estabelecimentos Parceiros</h2>
            <p class="text-slate-400 text-sm mt-1">Selecione uma das unidades abaixo para iniciar o seu fluxo de triagem e agendamento.</p>
        </div>

        <!-- Grid de Cards de Barbearias -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="tenants_grid">
            @forelse($tenants as $tenant)
                <div class="tenant-card bg-slate-900 border border-slate-800 hover:border-amber-500/40 rounded-2xl p-6 shadow-xl flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-1" data-name="{{ strtolower($tenant->name) }}">
                    <div>
                        <div class="w-14 h-14 bg-slate-950 border border-slate-800 rounded-xl flex items-center justify-center text-2xl mb-4 shadow-inner">
                            🧔🏻‍♂️
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1 tracking-tight">{{ $tenant->name }}</h3>
                        <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-4 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Unidade Ativa
                        </p>
                        <p class="text-sm text-slate-400 font-medium leading-relaxed mb-6">
                            Ambiente premium, atendimento personalizado e profissionais altamente qualificados para cuidar do seu visual.
                        </p>
                    </div>

                    <!-- Link Amigável Customizado para o Fluxo com Login Protegido -->
                    <a href="{{ route('booking.index', ['tenant_slug' => $tenant->slug]) }}" 
                        class="w-full text-center bg-slate-950 border border-slate-800 hover:bg-amber-500 hover:text-slate-950 hover:border-amber-500 text-amber-500 font-bold py-3.5 px-4 rounded-xl transition-all duration-300 uppercase tracking-wider text-xs shadow-md">
                        Agendar Horário 🗓️
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-slate-900/40 rounded-2xl border border-slate-900 text-slate-500 font-medium">
                    Nenhuma barbearia cadastrada na plataforma no momento.
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer da Plataforma -->
    <footer class="border-t border-slate-900 py-8 text-center text-xs text-slate-600 font-semibold uppercase tracking-widest">
        &copy; 2026 Barbearia Online SaaS Multi-Tenant. Todos os direitos reservados.
    </footer>

    <!-- Filtro de Busca Instantâneo -->
    <script>
        const searchInput = document.getElementById('search_input');
        const cards = document.querySelectorAll('.tenant-card');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase().trim();

            cards.forEach(card => {
                const tenantName = card.getAttribute('data-name');
                if (tenantName.includes(searchTerm)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>