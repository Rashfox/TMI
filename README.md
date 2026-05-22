# TMI

> A Laravel web application skeleton integrated with Vite and Tailwind CSS.

![GitHub stars](https://img.shields.io/github/stars/Rashfox/TMI?style=for-the-badge&logo=github) ![GitHub forks](https://img.shields.io/github/forks/Rashfox/TMI?style=for-the-badge&logo=github) ![GitHub issues](https://img.shields.io/github/issues/Rashfox/TMI?style=for-the-badge&logo=github) ![Last commit](https://img.shields.io/github/last-commit/Rashfox/TMI?style=for-the-badge&logo=github) ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=white) ![Node.js](https://img.shields.io/badge/Node.js-339933?style=for-the-badge&logo=nodedotjs&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white) ![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

## 📑 Table of Contents

- [Description](#description)
- [Key Features](#key-features)
- [Use Cases](#use-cases)
- [Tech Stack](#tech-stack)
- [Quick Start](#quick-start)
- [Environment Variables](#environment-variables)
- [Available Scripts](#available-scripts)
- [Project Structure](#project-structure)
- [Development Setup](#development-setup)
- [Contributing](#contributing)

## 📝 Description

TMI is a web application foundation built on the Laravel PHP framework. It provides a structured starting point for developing robust applications, utilizing a traditional Model-View-Controller backend alongside modern frontend asset management. The application features a pre-configured architecture including route management, database migration setups, and environment-driven configurations.

## ✨ Key Features

- **🐘 Laravel Framework Foundation** — Utilizes the robust Laravel architecture featuring custom routing, dependency injection, and integrated database migration support.
- **⚡ Vite and Tailwind Integration** — Employs Vite and Tailwind CSS for optimized frontend asset bundling and utility-first styling workflows.
- **🗄️ Multi-Driver Database Configuration** — Supports multiple database, cache, and session drivers including Redis, Memcached, and relational SQL backends.
- **✉️ Mail and Cloud Storage Ready** — Configured to integrate with standard SMTP/mail providers and AWS S3-compatible cloud storage systems.

## 🎯 Use Cases

- Developing a database-driven web application with a Laravel PHP backend and Tailwind CSS UI.
- Bootstrapping a scalable SaaS application requiring built-in background queues, caching layers, and user session management.

## 🛠️ Tech Stack

- 🟨 **JavaScript**
- ⬢ **Node.js**
- 🐘 **PHP**
- 🌬️ **Tailwind CSS**
- ⚡ **Vite**

**Notable libraries:** Laravel

## ⚡ Quick Start

```bash

# 1. Clone the repository
git clone https://github.com/Rashfox/TMI.git

# 2. Install dependencies
npm install

# 3. Configure environment
cp .env.example .env   # then fill in the values

# 4. Start the dev server
npm run dev
```

## 🔑 Environment Variables

The following environment variables are required (see `.env.example`):

```bash
APP_NAME=
APP_ENV=
APP_KEY=
APP_DEBUG=
APP_URL=
APP_LOCALE=
APP_FALLBACK_LOCALE=
APP_FAKER_LOCALE=
APP_MAINTENANCE_DRIVER=
BCRYPT_ROUNDS=
LOG_CHANNEL=
LOG_STACK=
LOG_DEPRECATIONS_CHANNEL=
LOG_LEVEL=
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
SESSION_DRIVER=
SESSION_LIFETIME=
SESSION_ENCRYPT=
SESSION_PATH=
SESSION_DOMAIN=
BROADCAST_CONNECTION=
FILESYSTEM_DISK=
QUEUE_CONNECTION=
CACHE_STORE=
MEMCACHED_HOST=
REDIS_CLIENT=
REDIS_HOST=
REDIS_PASSWORD=
REDIS_PORT=
MAIL_MAILER=
MAIL_SCHEME=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=
VITE_APP_NAME=
```

## 🚀 Available Scripts

- **build** — `npm run build`
- **dev** — `npm run dev`

## 📁 Project Structure

```
.
├── .agents
│   └── skills
│       ├── laravel-best-practices
│       │   ├── SKILL.md
│       │   └── rules
│       │       ├── advanced-queries.md
│       │       ├── architecture.md
│       │       ├── blade-views.md
│       │       ├── caching.md
│       │       ├── collections.md
│       │       ├── config.md
│       │       ├── db-performance.md
│       │       ├── eloquent.md
│       │       ├── error-handling.md
│       │       ├── events-notifications.md
│       │       ├── http-client.md
│       │       ├── mail.md
│       │       ├── migrations.md
│       │       ├── queue-jobs.md
│       │       ├── routing.md
│       │       ├── scheduling.md
│       │       ├── security.md
│       │       ├── style.md
│       │       ├── testing.md
│       │       └── validation.md
│       ├── pest-testing
│       │   └── SKILL.md
│       └── tailwindcss-development
│           └── SKILL.md
├── .env.example
├── 127_0_0_1.sql
├── app
│   ├── Http
│   │   └── Controllers
│   │       ├── Auth
│   │       │   ├── ConfirmPasswordController.php
│   │       │   ├── ForgotPasswordController.php
│   │       │   ├── LoginController.php
│   │       │   ├── RegisterController.php
│   │       │   ├── ResetPasswordController.php
│   │       │   └── VerificationController.php
│   │       ├── Controller.php
│   │       ├── EventController.php
│   │       ├── HomeController.php
│   │       ├── LaporanController.php
│   │       └── TiketController.php
│   ├── Mail
│   │   └── NotifikasiTiket.php
│   ├── Models
│   │   ├── Event.php
│   │   ├── Tiket.php
│   │   └── User.php
│   └── Providers
│       └── AppServiceProvider.php
├── artisan
├── boost.json
├── bootstrap
│   ├── app.php
│   └── providers.php
├── composer.json
├── composer.lock
├── config
│   ├── adminlte copy.php
│   ├── adminlte.php
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
├── database
│   ├── factories
│   │   └── UserFactory.php
│   ├── migrations
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2026_05_22_040009_create_tikets_table.php
│   │   └── 2026_05_22_041230_create_events_table.php
│   └── seeders
│       └── DatabaseSeeder.php
├── package.json
├── phpunit.xml
├── public
│   ├── favicon.ico
│   ├── img
│   │   └── posters
│   │       └── poster-1779436275.jpg
│   ├── index.php
│   └── robots.txt
├── resources
│   ├── css
│   │   └── app.css
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   ├── sass
│   │   ├── _variables.scss
│   │   └── app.scss
│   └── views
│       ├── admin
│       │   └── dashboard.blade.php
│       ├── auth
│       │   ├── login.blade.php
│       │   ├── passwords
│       │   │   ├── confirm.blade.php
│       │   │   ├── email.blade.php
│       │   │   └── reset.blade.php
│       │   ├── register.blade.php
│       │   └── verify.blade.php
│       ├── event
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── home.blade.php
│       ├── laporan
│       │   └── index.blade.php
│       ├── tiket
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── home.blade.php
│       │   └── laporan_pdf.blade.php
│       └── welcome.blade.php
├── routes
│   ├── console.php
│   └── web.php
├── tests
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── Pest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── vite.config.js
```

## 🛠️ Development Setup

### Node.js / JavaScript
1. Install Node.js (v18+ recommended)
2. Install dependencies: `npm install` (or `yarn` / `pnpm install` / `bun install`)
3. Start the dev server: see the **Quick Start** above

## 👥 Contributing

Contributions are welcome! Here's the standard flow:

1. **Fork** the repository
2. **Clone** your fork: `git clone https://github.com/Rashfox/TMI.git`
3. **Branch**: `git checkout -b feature/your-feature`
4. **Commit**: `git commit -m 'feat: add some feature'`
5. **Push**: `git push origin feature/your-feature`
6. **Open** a pull request

Please follow the existing code style and include tests for new behavior where applicable.

---
*This README was generated with ❤️ by [ReadmeBuddy](https://readmebuddy.com)*
