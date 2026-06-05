<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - Barbearia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased py-12">

    <div class="max-w-4xl mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-black text-slate-900">⚙️ Painel de Cadastro Rápido</h1>
            <a href="{{ route('booking.index') }}" class="text-sm font-bold text-amber-600 hover:underline">← Voltar para a Agenda</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold mb-4 text-slate-800">✂️ Cadastrar Serviço</h2>
                <form action="{{ route('service.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Nome do Serviço</label>
                        <input type="text" name="name" placeholder="Ex: Corte Degradê" required class="w-full p-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Categoria</label>
                        <input type="text" name="category" placeholder="Ex: Cabelo, Barba, Combo" required class="w-full p-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Preço (R$)</label>
                            <input type="number" step="0.01" name="price" placeholder="45.00" required class="w-full p-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Duração (Minutos)</label>
                            <input type="number" name="duration_minutes" placeholder="30" required class="w-full p-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                        <label standalone for="is_featured" class="ml-2 text-sm text-gray-600">Destacar este serviço na vitrine</label>
                    </div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 rounded-lg transition">Adicionar Serviço</button>
                </form>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold mb-4 text-slate-800">💈 Cadastrar Barbeiro</h2>
                <form action="{{ route('professional.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Nome do Barbeiro</label>
                        <input type="text" name="name" placeholder="Ex: Maycon da Navalha" required class="w-full p-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Especialidade</label>
                        <input type="text" name="specialty" placeholder="Ex: Especialista em Degradê e Barbas" required class="w-full p-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold py-2.5 rounded-lg transition">Adicionar Barbeiro</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>