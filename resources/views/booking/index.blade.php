<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo à Barbearia Online</title>
    <!-- Tailwind CSS via CDN para estilização rápida -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Hero Section / Boas-vindas -->
    <header class="bg-slate-900 text-white py-16 px-4 text-center shadow-md">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">
                💈 Bem-vindo à <span class="text-amber-500">Barbearia Online</span>
            </h1>
            <p class="text-lg text-slate-300 max-w-xl mx-auto">
                Escolha o seu barbeiro de preferência, selecione o serviço na nossa vitrine e agende seu horário em poucos segundos.
            </p>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-12">
        
        <!-- Mensagens de Alerta (Sucesso / Erro) -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-8 text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-8 text-center font-medium">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulário de Agendamento Rápido -->
        <form action="" method="POST" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-12">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-slate-800">Faça seu Agendamento Online</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Seleção de Serviço -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">1. Escolha o Serviço</label>
                    <select name="service_id" required class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        <option value="">Selecione um serviço...</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }} — R$ {{ number_format($service->price, 2, ',', '.') }} ({{ $service->duration_minutes }} min)</option>
                        @endforeach
                    </select>
                </div>

                <!-- Seleção de Profissional -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">2. Escolha o Profissional</label>
                    <select name="professional_id" required class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        <option value="">Selecione um barbeiro...</option>
                        @foreach($professionals as $professional)
                            <option value="{{ $professional->id }}">{{ $professional->name }} ({{ $professional->specialty }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Data e Hora -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">3. Escolha a Data e Hora</label>
                    <input type="datetime-local" name="start_time" required class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>
            </div>

            <button type="submit" class="w-full md:w-auto bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-8 py-3 rounded-lg transition duration-200 shadow-md">
                Confirmar Agendamento 📅
            </button>
        </form>

        <!-- Vitrine de Serviços (Baseado no layout do sistema) -->
        <section>
            <h2 class="text-2xl font-bold mb-6 text-slate-800">Nossa Vitrine de Serviços</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $service)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <span class="text-xs font-semibold uppercase tracking-wider text-amber-600 bg-amber-50 px-2 py-1 rounded">
                                {{ $service->category }}
                            </span>
                            <h3 class="text-xl font-bold mt-2 text-slate-900">{{ $service->name }}</h3>
                            <p class="text-gray-500 text-sm mt-1">⏱ Duração estimada: {{ $service->duration_minutes }} minutos</p>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                            <span class="text-2xl font-black text-slate-900">R$ {{ number_format($service->price, 2, ',', '.') }}</span>
                            @if($service->is_featured)
                                <span class="text-xs bg-purple-100 text-purple-700 font-bold px-2 py-1 rounded">🔥 Destaque</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-full text-center py-8">Nenhum serviço cadastrado na vitrine ainda.</p>
                @endforelse
            </div>
        </section>

    </main>

    <footer class="bg-slate-900 text-slate-500 py-8 text-center text-sm border-t border-slate-800 mt-20">
        <p>&copy; {{ date('Y') }} Barbearia Online. Todos os direitos reservados.</p>
    </footer>

</body>
</html>