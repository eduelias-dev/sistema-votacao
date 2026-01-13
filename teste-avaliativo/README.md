# 📊 Sistema de Votação em Tempo Real

Este projeto é uma aplicação de gerenciamento e participação em enquetes. O sistema foca em interatividade, precisão de dados e uma interface de usuário intuitiva.

---

## 📝 Sobre o Projeto

O objetivo desta aplicação é permitir que usuários criem enquetes com múltiplas opções e que outros usuários possam votar e acompanhar os resultados instantaneamente.

### 🎯 Objetivos Alcançados
* **CRUD Completo:** Gestão total de enquetes (Criar, Listar, Editar e Excluir).
* **Experiência do Usuário (UX):** Interface moderna e responsiva construída com **Tailwind CSS**, incluindo estados de *hover*, ícones intuitivos e confirmações de segurança.
* **Interatividade:** Sistema de votação dinâmico utilizando **Laravel Livewire**, permitindo votar e visualizar resultados em tempo real sem a necessidade de atualizar a página.
* **Lógica de Negócio:** Controle de prazos (Data de Início/Fim) com tratamento automático de status (*Não iniciada*, *Em andamento*, *Encerrada*).

### 🛠️ Tecnologias Utilizadas
* **Framework:** Laravel 11
* **Frontend Interativo:** Livewire 3
* **Estilização:** Tailwind CSS
* **Banco de Dados:** MySQL
* **Manipulação de Datas:** Carbon (configurado para Timezone `America/Sao_Paulo`)

---

## 🚀 Como instalar o projeto

1. Clone o repositório:
   `git clone https://github.com/eduelias-dev/sistema-votacao.git`

2. Instale as dependências:
   `composer install`

3. Prepare o ambiente:
   - Copie o arquivo de exemplo: `cp .env.example .env`
   - Gere a chave da aplicação: `php artisan key:generate`
   - Configure seu banco de dados no `.env`

4. Rode as migrações:
   `php artisan migrate`

5. Inicie o servidor:
   `bpm run dev`
   `php artisan serve`