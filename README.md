# Iranigram 🇮🇷

A mini social network built with **Laravel 12** as a portfolio project.

---

## ✨ Features

- 🔐 Authentication (register / login / logout)
- 👤 User profiles (bio, avatar, cover)
- 📝 Posts with text and images
- ❤️ Likes and comments
- 🔍 User search
- 📱 Responsive UI with Tailwind CSS

> 🚧 Under active development.

---

## 🛠 Tech Stack

| Layer | Tech |
|---|---|
| Backend | Laravel 12 |
| Frontend | Blade + Tailwind CSS |
| Database | SQLite (local) / MySQL (production) |
| Auth | Laravel Breeze |
| Build | Vite |

---

## 🚀 Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm run dev
php artisan serve
