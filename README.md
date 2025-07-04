# 💳 Integração com PAGCOMPLETO - Laravel 11 + PHP 8.4

Este projeto implementa uma API REST para processar pagamentos utilizando o gateway **PAGCOMPLETO**, com registro de pedidos no banco de dados PostgreSQL. Desenvolvido com **Laravel 11** e **PHP 8.4**, o sistema está preparado para integração segura e escalável.

---

## 🚀 Tecnologias Utilizadas

- [x] PHP 8.4
- [x] Laravel 11
- [x] PostgreSQL
- [x] Laravel HTTP Client
- [x] Validação e tratamento de erros
- [x] Boas práticas com `.env` e versionamento seguro

---

## 🛠️ Requisitos

- PHP 8.2 ou superior (idealmente 8.4)
- Composer
- PostgreSQL
- Git

---

## 📦 Instalação

```bash
git clone https://github.com/Victooooooor/pagamento-pagcompleto
cd pagamento-pagcompleto
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
