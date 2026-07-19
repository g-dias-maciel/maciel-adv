# Projeto: Escritório Jurídico Internacional - MVP

## 1. Contexto e Objetivo
Sistema web para escritório de advocacia focado em brasileiros no exterior. O sistema possui um funil de qualificação (Landing Page + Quiz) para captação de clientes de divórcio consensual e homologação de sentenças, filtrando litígios. O backend atua como um CRM interno para gestão dos processos.

## 2. Stack Tecnológico (100% Dockerizado)
*   **Infraestrutura:** Docker via Laravel Sail.
*   **Backend:** PHP 8.3+, Laravel 11.
*   **Banco de Dados:** MySQL 8.0 (Container).
*   **Cache e Filas:** Redis (Container).
*   **Frontend (Fase 1 - LP e Quiz):** Livewire 3, Alpine.js e Tailwind CSS (TALL Stack).
*   **Admin/CRM (Fase 2):** Filament PHP v3.

## 3. Metodologia de Desenvolvimento
*   **Tests Before Implementation:** Todo código deve ser escrito seguindo a metodologia TDD (Test-Driven Development). Primeiro escrevemos os testes automatizados que validam o comportamento esperado, depois implementamos a funcionalidade. Antes de dar qualquer tarefa como concluída, os testes devem ser executados e todas as falhas corrigidas. Nunca prossiga carregando um erro — corrija-o primeiro.
*   **Cobertura Mínima:** Testes unitários para toda lógica de negócio (componentes Livewire, serviços, models). Testes de feature para rotas e fluxos completos.

## 4. Regras de Arquitetura e Integração (n8n)
*   **Event-Driven:** Toda conversão bem-sucedida no quiz deve disparar um Evento no Laravel (ex: `LeadQualifiedEvent`).
*   **Filas:** Listeners desses eventos devem ser assíncronos (`ShouldQueue`) processados pelo Redis.
*   **Integração Externa:** O envio de dados para o n8n ou outras ferramentas de automação deve ser feito via HTTP Requests dentro dos Jobs, nunca travando o frontend do usuário.
*   **API Padrão:** Rotas que o n8n consumirá devem estar em `routes/api.php` e protegidas via Laravel Sanctum (API Tokens).

## 5. Estado Atual e Fases do Projeto
- [x] **Fase 1:** Setup Docker (Laravel Sail), Landing Page e Quiz Qualificador (Livewire).
- [ ] **Fase 2:** Estruturação do banco de dados (Migrations de Leads e Processos).
- [ ] **Fase 3:** Setup do Filament PHP para o painel de gestão.
- [ ] **Fase 4:** Integração com Webhooks (n8n).

## 6. Changelog e Decisões de Engenharia
*(Claude, atualize esta seção automaticamente sempre que criarmos uma migration importante, adicionarmos um pacote ou mudarmos a arquitetura)*
*   **[2025-07-19]** - Inicialização do documento `claude.md`.
*   **[2025-07-19]** - Instalado **Livewire v3.8.2** via Composer (Sail). Tailwind CSS v4 já presente no projeto.
*   **[2025-07-19]** - Criado componente **`QuizQualifier`** (Livewire): 5 perguntas de qualificação + lógica de desqualificação (não-brasileiros e litígios).
*   **[2025-07-19]** - Criado componente **`LeadCapture`** (Livewire): formulário de captura com validação (nome, email, telefone, país).
*   **[2025-07-19]** - Rota raiz (`/`) redirecionada para o componente `QuizQualifier`.
*   **[2025-07-19]** - Frontend estilizado com Tailwind CSS v4 (gradientes, glassmorphism, animações).
*   **[2025-07-19]** - Adicionada diretriz **Tests Before Implementation (TDD)** — todo código deve ser precedido por testes automatizados.
*   **[2025-07-19]** - Criados testes de feature (PHPUnit + Livewire) para **QuizQualifier** (27 testes) e **LeadCapture** (10 testes). Corrigido bug na view onde `$isQualified` não era passada ao template. Suite completa: **39 testes, 72 asserções, 0 falhas**.

---
> **INSTRUÇÃO PARA A IA (CLAUDE CLI):** 
> Você deve ler este arquivo no início de cada sessão para entender o contexto. Sempre que você executar uma mudança estrutural, criar uma tabela no banco, ou tomar uma decisão de arquitetura, VOCÊ DEVE modificar este arquivo e adicionar a mudança na seção "Changelog e Decisões de Engenharia".
