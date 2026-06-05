<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - SaaS Barbearia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="text-2xl">⚡</span>
                <h1 class="text-xl font-black text-slate-900 uppercase tracking-wider">Painel Administrativo</h1>
            </div>
            <a href="{{ route('booking.index', ['tenant_slug' => request()->route('tenant_slug')]) }}" target="_blank" class="text-sm font-semibold bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded-xl transition">
                Ver Página de Agendamento ↗
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10 space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase">Faturamento Total</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-1">R$ {{ number_format($faturamentoTotal, 2, ',', '.') }}</h3>
                </div>
                <span class="text-3xl bg-emerald-50 text-emerald-600 p-3 rounded-xl">💰</span>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase">Agendamentos</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-1">{{ $totalAgendamentos }}</h3>
                </div>
                <span class="text-3xl bg-blue-50 text-blue-600 p-3 rounded-xl">📅</span>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase">Ticket Médio</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-1">R$ {{ number_format($ticketMedio, 2, ',', '.') }}</h3>
                </div>
                <span class="text-3xl bg-amber-50 text-amber-600 p-3 rounded-xl">📊</span>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-slate-900">🗓️ Agenda Próximos Clientes</h2>
                <span class="text-xs font-semibold bg-slate-100 text-slate-600 px-3 py-1 rounded-full">Filtro automático por Barbearia</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-400 text-xs font-bold uppercase tracking-wider border-b border-slate-100">
                            <th class="py-4 px-6">Horário / Data</th>
                            <th class="py-4 px-6">Cliente</th>
                            <th class="py-4 px-6">Serviço Escolhido</th>
                            <th class="py-4 px-6">Barbeiro Designado</th>
                            <th class="py-4 px-6">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($appointments as $appointment)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-6 font-semibold text-slate-900">
                                    {{ date('d/m/Y - H:i', strtotime($appointment->start_time)) }}h
                                </td>
                                <td class="py-4 px-6 text-slate-600">
                                    {{ $appointment->user->name ?? 'Cliente Avulso' }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-medium text-slate-900">{{ $appointment->service->name ?? 'Não Informado' }}</span>
                                    <span class="block text-xs text-slate-400">R$ {{ number_format($appointment->service->price ?? 0, 2, ',', '.') }}</span>
                                </td>
                                <td class="py-4 px-6 text-slate-700">
                                    💈 {{ $appointment->professional->name ?? 'Qualquer Disponível' }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 capitalize">
                                        ● {{ $appointment->status ?? 'Confirmado' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-400 font-medium">
                                    Nenhum agendamento realizado nesta barbearia ainda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>