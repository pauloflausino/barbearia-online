<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberSaaS - O Sistema para Barbearias Profissionais</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#FDFBF7] text-slate-900 antialiased font-sans">

    <!-- Navbar -->
    <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-2 font-bold text-xl text-[#0F2E43]">
            <span class="p-2 bg-[#0F2E43] text-white rounded-lg"><i class="fa-solid fa-scissors"></i></span>
            <span>BarberSaaS</span>
        </div>
        <div class="hidden md:flex items-center space-x-8 font-medium text-slate-600">
            <a href="#recursos" class="hover:text-[#0F2E43]">Recursos</a>
            <a href="#ia" class="hover:text-[#0F2E43]">IA Growth</a>
            <a href="#planos" class="hover:text-[#0F2E43]">Planos</a>
        </div>
        <a href="#planos" class="bg-[#0F2E43] text-white px-5 py-2.5 rounded-full font-semibold hover:bg-slate-800 transition">Comprar sistema</a>
    </nav>

    <!-- Hero Section -->
    <header class="max-w-5xl mx-auto text-center px-6 pt-16 pb-12">
        <span class="bg-[#EBF3F6] text-[#0F2E43] text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider">⚡ O Sistema nº 1 para Barbearias</span>
        <h1 class="text-4xl md:text-6xl font-black text-[#0F2E43] tracking-tight mt-6 max-w-4xl mx-auto leading-tight">
            A barbearia profissional roda em sistema profissional.
        </h1>
        <p class="text-slate-600 text-lg md:text-xl mt-6 max-w-2xl mx-auto">
            Agenda online, comissões automáticas, contas a pagar e receber, relatórios e inteligência artificial para reter 3x mais clientes.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#planos" class="w-full sm:w-auto bg-[#0F2E43] text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-slate-800 transition shadow-lg shadow-slate-900/20">Criar minha conta <i class="fa-solid fa-arrow-right ml-2"></i></a>
            <a href="#recursos" class="w-full sm:w-auto border-2 border-slate-200 text-slate-700 px-8 py-4 rounded-xl font-bold text-lg hover:bg-slate-100 transition">Explorar sistema</a>
        </div>
    </header>

    <!-- Estatísticas -->
    <section class="bg-[#0F2E43] text-white py-12">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-3xl md:text-4xl font-black text-amber-400">2.400+</h3>
                <p class="text-slate-300 text-sm mt-1">Barbearias ativas</p>
            </div>
            <div>
                <h3 class="text-3xl md:text-4xl font-black text-amber-400">180k+</h3>
                <p class="text-slate-300 text-sm mt-1">Agendamentos mensais</p>
            </div>
            <div>
                <h3 class="text-3xl md:text-4xl font-black text-amber-400">98%</h3>
                <p class="text-slate-300 text-sm mt-1">Satisfação e retenção</p>
            </div>
            <div>
                <h3 class="text-3xl md:text-4xl font-black text-amber-400">4.9★</h3>
                <p class="text-slate-300 text-sm mt-1">Avaliação média</p>
            </div>
        </div>
    </section>

    <!-- Problemas: Você se reconhece nisso? -->
    <section class="max-w-6xl mx-auto px-6 py-20">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#0F2E43]">Você se reconhece nisso?</h2>
            <p class="text-slate-600 mt-3">Gerenciar uma barbearia sem ferramentas profissionais gera gargalos ocultos.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Problema 1 -->
            <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm">
                <span class="text-red-500 bg-red-50 p-3 rounded-xl inline-block"><i class="fa-solid fa-calendar-xmark text-xl"></i></span>
                <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Agenda desorganizada</h4>
                <p class="text-slate-500 text-sm mt-2">Clientes esquecendo horários, marcações duplicadas no papel ou no WhatsApp e brechas na agenda.</p>
            </div>
            <!-- Problema 2 -->
            <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm">
                <span class="text-red-500 bg-red-50 p-3 rounded-xl inline-block"><i class="fa-solid fa-calculator text-xl"></i></span>
                <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Caos nas comissões</h4>
                <p class="text-slate-500 text-sm mt-2">Todo fim de mês vira uma maratona de planilhas para calcular o que é de cada barbeiro.</p>
            </div>
            <!-- Problema 3 -->
            <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm">
                <span class="text-red-500 bg-red-50 p-3 rounded-xl inline-block"><i class="fa-solid fa-user-slash text-xl"></i></span>
                <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Clientes somem sem aviso</h4>
                <p class="text-slate-500 text-sm mt-2">Você não sabe quem parou de frequentar e perde faturamento por falta de um pós-venda.</p>
            </div>
        </div>
    </section>

    <!-- 9 Módulos (Replicando a estrutura principal de image_aa8985.png e image_781be8.jpg) -->
    <section id="recursos" class="bg-[#F7F5F0] py-20 border-t border-b border-slate-200/50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-[#0F2E43]">9 módulos. Um sistema.</h2>
                <p class="text-slate-600 mt-3">Tudo que sua barbearia precisa integrado de ponta a ponta.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Módulo 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-regular fa-calendar-check text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Agenda online</h4>
                    <p class="text-slate-500 text-sm mt-1">Calendário semanal visual com agendamentos coloridos por profissional. Reagende via drag-and-drop.</p>
                </div>
                <!-- Módulo 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-user-tie text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Profissionais</h4>
                    <p class="text-slate-500 text-sm mt-1">Cadastre barbeiros com foto, especialidade, horários customizados e veja as agendas individuais.</p>
                </div>
                <!-- Módulo 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-percent text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Comissões automáticas</h4>
                    <p class="text-slate-500 text-sm mt-1">Defina comissão fixa ou percentual por serviço. Calcule tudo automaticamente no fim do mês.</p>
                </div>
                <!-- Módulo 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-users text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Clientes recorrentes</h4>
                    <p class="text-slate-500 text-sm mt-1">Histórico completo, tags automáticas (VIP/Novo/Recorrente) e linha do tempo de atendimentos.</p>
                </div>
                <!-- Módulo 5 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-shop text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Vitrine de serviços</h4>
                    <p class="text-slate-500 text-sm mt-1">Catálogo público organizado por categorias com preços, duração estimada e destaques.</p>
                </div>
                <!-- Módulo 6 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-money-bill-trend-up text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Financeiro integrado</h4>
                    <p class="text-slate-500 text-sm mt-1">Entradas e saídas diretamente conectadas aos agendamentos realizados. Fluxo em tempo real.</p>
                </div>
                <!-- Módulo 7 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-chart-line text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Relatórios abrangentes</h4>
                    <p class="text-slate-500 text-sm mt-1">Faturamento total, taxa de ocupação das cadeiras, ticket médio e ranking de barbeiros.</p>
                </div>
                <!-- Módulo 8 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-brain text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">AI Growth</h4>
                    <p class="text-slate-500 text-sm mt-1">Inteligência artificial integrada que identifica automaticamente clientes inativos e sugere ações de receita.</p>
                </div>
                <!-- Módulo 9 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <span class="text-[#0F2E43] bg-slate-100 p-3 rounded-xl inline-block"><i class="fa-solid fa-globe text-xl"></i></span>
                    <h4 class="text-lg font-bold text-[#0F2E43] mt-4">Booking público</h4>
                    <p class="text-slate-500 text-sm mt-1">Link exclusivo da sua barbearia para o cliente agendar 24 horas por dia, 7 dias por semana sem baixar app.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção IA Growth -->
    <section id="ia" class="max-w-6xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="bg-purple-100 text-purple-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Módulo Exclusivo</span>
            <h2 class="text-3xl md:text-4xl font-black text-[#0F2E43] mt-4">IA que trabalha enquanto você corta.</h2>
            <p class="text-slate-600 mt-4">
                Nosso motor de inteligência artificial monitora o comportamento dos clientes. Se um cliente VIP passar do tempo comum de retorno, a IA engaja preventivamente.
            </p>
            <ul class="mt-6 space-y-3 font-medium text-slate-700">
                <li><i class="fa-solid fa-circle-check text-green-600 mr-2"></i> Identificação de clientes sumidos</li>
                <li><i class="fa-solid fa-circle-check text-green-600 mr-2"></i> Alertas automáticos de horários vazios</li>
                <li><i class="fa-solid fa-circle-check text-green-600 mr-2"></i> Campanhas personalizadas automáticas</li>
            </ul>
        </div>
        <!-- Mockup Visual de IA baseado na image_781be8.jpg -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xl space-y-4">
            <div class="bg-amber-50 border border-amber-200 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <h5 class="font-bold text-slate-800 text-sm">Alerta de Inatividade detectado</h5>
                    <p class="text-xs text-slate-500">32 clientes não voltam há mais de 45 dias.</p>
                </div>
                <span class="bg-amber-500 text-white text-xs font-bold px-2 py-1 rounded">Resolver</span>
            </div>
            <div class="bg-purple-50 border border-purple-200 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <h5 class="font-bold text-slate-800 text-sm">Campanha Inteligente Ativa</h5>
                    <p class="text-xs text-slate-500">Notificações enviadas preencheram 14 horários vagos.</p>
                </div>
                <span class="bg-purple-600 text-white text-xs font-bold px-2 py-1 rounded">Otimizado</span>
            </div>
        </div>
    </section>

    <!-- Planos de Preço -->
    <section id="planos" class="max-w-6xl mx-auto px-6 py-20 border-t border-slate-200">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#0F2E43]">Planos simples e claros</h2>
            <p class="text-slate-600 mt-3">Comece grátis, mude ou cancele quando quiser.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
            <!-- Plano 1 -->
            <div class="bg-white p-8 rounded-3xl border border-slate-200 flex flex-col justify-between">
                <div>
                    <h4 class="text-xl font-bold text-slate-700">Starter</h4>
                    <p class="text-slate-400 text-sm mt-1">Para barbeiros autônomos</p>
                    <div class="mt-6 flex items-baseline text-slate-900">
                        <span class="text-4xl font-black tracking-tight">R$97</span>
                        <span class="ml-1 text-slate-500">/mês</span>
                    </div>
                    <ul class="mt-8 space-y-4 text-sm font-medium text-slate-600">
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> Até 2 profissionais</li>
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> Agenda Online Completa</li>
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> Booking Público</li>
                        <li class="text-slate-300 line-through"><i class="fa-solid fa-xmark mr-2"></i> AI Growth Inteligente</li>
                    </ul>
                </div>
                <button class="w-full mt-8 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-3 px-4 rounded-xl transition">Começar Agora</button>
            </div>

            <!-- Plano 2 - Destaque Pro -->
            <div class="bg-[#0F2E43] text-white p-8 rounded-3xl shadow-xl flex flex-col justify-between relative transform md:-translate-y-4 border-4 border-amber-400">
                <span class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-amber-400 text-slate-950 text-xs font-black px-4 py-1 rounded-full uppercase tracking-wider">Mais Assinado</span>
                <div>
                    <h4 class="text-xl font-bold text-amber-400">Pro</h4>
                    <p class="text-slate-300 text-sm mt-1">Para barbearias em crescimento</p>
                    <div class="mt-6 flex items-baseline text-white">
                        <span class="text-5xl font-black tracking-tight">R$197</span>
                        <span class="ml-1 text-slate-400">/mês</span>
                    </div>
                    <ul class="mt-8 space-y-4 text-sm font-medium text-slate-200">
                        <li><i class="fa-solid fa-check text-amber-400 mr-2"></i> Profissionais Ilimitados</li>
                        <li><i class="fa-solid fa-check text-amber-400 mr-2"></i> Agenda + Comissões Automáticas</li>
                        <li><i class="fa-solid fa-check text-amber-400 mr-2"></i> Financeiro Avançado</li>
                        <li><i class="fa-solid fa-check text-amber-400 mr-2"></i> Módulo AI Growth Completo</li>
                    </ul>
                </div>
                <button class="w-full mt-8 bg-amber-400 hover:bg-amber-500 text-slate-950 font-black py-3 px-4 rounded-xl transition shadow-lg">Experimentar Pro</button>
            </div>

            <!-- Plano 3 -->
            <div class="bg-white p-8 rounded-3xl border border-slate-200 flex flex-col justify-between">
                <div>
                    <h4 class="text-xl font-bold text-slate-700">Enterprise</h4>
                    <p class="text-slate-400 text-sm mt-1">Para grandes redes e franquias</p>
                    <div class="mt-6 flex items-baseline text-slate-900">
                        <span class="text-4xl font-black tracking-tight">R$397</span>
                        <span class="ml-1 text-slate-500">/mês</span>
                    </div>
                    <ul class="mt-8 space-y-4 text-sm font-medium text-slate-600">
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> Multi-unidades / Franquias</li>
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> Tudo do plano Pro</li>
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> Suporte Prioritário VIP</li>
                        <li><i class="fa-solid fa-check text-[#0F2E43] mr-2"></i> API de integração customizada</li>
                    </ul>
                </div>
                <button class="w-full mt-8 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-3 px-4 rounded-xl transition">Falar Comercial</button>
            </div>
        </div>
    </section>

    <!-- Call to Action Final -->
    <section class="bg-[#0F2E43] text-white py-20 text-center px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-black tracking-tight">Pronto para transformar sua barbearia?</h2>
            <p class="text-slate-300 mt-4 text-lg max-w-xl mx-auto">Crie sua conta em menos de 2 minutos e experimente o poder do controle total.</p>
            <div class="mt-8">
                <a href="#planos" class="bg-amber-400 hover:bg-amber-500 text-slate-950 font-black px-8 py-4 rounded-xl text-lg transition inline-block shadow-lg">Começar Gratuitamente</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 text-slate-500 py-8 text-center text-sm border-t border-slate-900">
        <p>&copy; 2026 BarberSaaS. Todos os direitos reservados. Design baseado em image_781be8.jpg.</p>
    </footer>

</body>
</html>