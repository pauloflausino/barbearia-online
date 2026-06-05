# 💈 Plataforma SaaS Multi-Tenant para Barbearias

Uma aplicação SaaS (Software as a Service) completa desenvolvida em **Laravel 12**, **PHP 8.2** e **Tailwind CSS**. O sistema utiliza uma arquitetura de banco de dados única com isolamento lógico via escopos (**Multi-tenancy via subpastas/URL**), permitindo que infinitas barbearias operem de forma 100% independente sob o mesmo domínio.

---

## 🚀 Funcionalidades Principais

### 🌐 Portal Central (Landing Page)
* **Vitrine Global:** Página inicial (`/`) que lista de forma dinâmica todas as barbearias parceiras ativas na plataforma.
* **Busca Instantânea:** Filtro em JavaScript Vanilla para localização imediata de estabelecimentos sem recarregar a página.

### 🏠 Fluxo do Tenant (Barbearia)
* **URLs Amigáveis:** Cada estabelecimento possui seu próprio ecossistema isolado através do slug (ex: `/b/navalha-de-ouro`).
* **Triagem Inteligente (Wizard):** Formulário de agendamento passo a passo guiado por comportamento dinâmico que bloqueia etapas futuras até a seleção atual.
* **Proteção de Horários:** Validação no backend com Carbon para impedir choques de horários e agendamentos encavalados na agenda de um mesmo barbeiro.

### 🔒 Autenticação e Segurança
* **Login Contextualizado:** Telas de login integradas à URL do tenant (`/b/{tenant_slug}/login`).
* **Centralização de Dados:** Vínculo direto de agendamentos com a tabela nativa de usuários (`user_id`), eliminando redundância de dados no banco.
* **Middleware de Captura:** Redirecionamento de convidados inteligente que identifica o estabelecimento atual e os joga para o login correto.

---

## 🛠️ Arquitetura e Modelagem do Banco

O isolamento dos dados de cada barbearia é garantido pelo campo `tenant_id` presente em todas as tabelas transacionais, automatizado através de uma Trait de Escopo Global (`BelongsToTenant`).