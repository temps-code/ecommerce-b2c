<div align="center">

<img src="https://raw.githubusercontent.com/temps-code/ecommerce-b2c/main/public/storage/images/user.jpg" alt="E-commerce B2C" width="80%" />

<h1>E-commerce B2C</h1>

<p><strong>A full-featured B2C online store with admin panel, shopping cart, and PDF reports — built with Laravel 12.</strong></p>

<p>
  <img src="https://img.shields.io/badge/Laravel_12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP_8.4-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.4">
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=black" alt="Alpine.js">
  <img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
</p>

</div>

---

📄 Read this in: **English** | [Español](README.es.md)

**Academic Project**
Universidad Privada Domingo Savio — Ing. de Sistemas
Course: Web Technology II · 2025

---

## Table of Contents

- [Preview](#-preview)
- [What It Does](#-what-it-does)
- [Stack](#-stack)
- [Team](#-team)
- [Architecture](#-architecture)
- [Installation](#-installation)
- [Environment Variables](#-environment-variables)
- [Routes](#-routes)
- [Seed Data](#-seed-data)

---

## 🖼 Preview

<div align="center">
  <img src="https://raw.githubusercontent.com/temps-code/ecommerce-b2c/main/public/storage/images/admin.jpg" alt="Admin Dashboard" width="49%">
  <img src="https://raw.githubusercontent.com/temps-code/ecommerce-b2c/main/public/storage/images/user.jpg" alt="Customer Storefront" width="49%">
</div>

---

## ✨ What It Does

A complete B2C e-commerce platform covering the full cycle from product management to customer purchase.

**Customer area:**
- Browse and search the full product catalog
- Add items to a session-based shopping cart
- Register, log in, and manage your profile
- Complete purchases through a simple checkout flow

**Admin panel:**
- Role-based access control (admin / customer)
- Real-time dashboard with sales, top products, and top customers
- Full CRUD for products, categories, users, and orders
- Soft delete and reactivation for all entities
- Export products, users, and sales as PDF reports

---

## 🛠 Stack

| Category | Technology | Version |
|---|---|---|
| **Core** | Laravel | 12.x |
| **Core** | PHP | 8.4+ |
| **Database** | MySQL | 8.0+ |
| **Frontend** | Tailwind CSS | 3.x |
| **Frontend** | Alpine.js | 3.x |
| **Frontend** | Bootstrap | 5.x (CDN) |
| **Frontend** | Font Awesome | 6.x (CDN) |
| **Build** | Vite | 6.x |
| **PDF** | DomPDF | 3.1 |
| **Auth** | Laravel Breeze | 2.x |
| **Testing** | PHPUnit | 11.5 |

---

## 👥 Team

| Member | Role | Contributions |
|---|---|---|
| **Diego Vargas** | Full-Stack Developer | Admin panel, business logic, project architecture |
| **Damaris Mamani** | Frontend Developer | Customer UI, responsive design, UX |
| **Yordy Sanchez** | Frontend Developer | Views, components, client-server integration |

---

## 🗂 Architecture

```
ecommerce-b2c/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin CRUD controllers
│   │   │   ├── Auth/               # Authentication controllers
│   │   │   ├── CartController.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/                     # User, Product, Category, Sale, SaleDetail
├── resources/views/
│   ├── admin/                      # Admin panel Blade views
│   ├── home/                       # Customer storefront views
│   ├── cart/                       # Shopping cart view
│   └── layouts/                    # Shared layouts
├── routes/
│   ├── web.php                     # All web routes
│   └── auth.php                    # Auth routes (Breeze)
├── database/
│   ├── migrations/                 # Schema definitions
│   ├── factories/                  # Model factories
│   └── seeders/                    # Database seeders
└── public/storage/                 # Uploaded product images
```

---

## ⚙️ Installation

### Requirements

- PHP 8.4+
- MySQL 8.0+
- Node.js 18+
- Composer 2.6+

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/temps-code/ecommerce-b2c.git
   cd ecommerce-b2c
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install frontend dependencies and build assets:
   ```bash
   npm install && npm run build
   ```

4. Copy and configure the environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Update `.env` with your database credentials, then run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Create the storage symlink for uploaded images:
   ```bash
   php artisan storage:link
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

> The app will be available at `http://localhost:8000`.

---

## 🔐 Environment Variables

Key variables to set in your `.env` file:

| Variable | Description | Default |
|---|---|---|
| `APP_URL` | Application base URL | `http://localhost` |
| `DB_CONNECTION` | Database driver | `mysql` |
| `DB_HOST` | Database host | `127.0.0.1` |
| `DB_PORT` | Database port | `3306` |
| `DB_DATABASE` | Database name | — |
| `DB_USERNAME` | Database user | — |
| `DB_PASSWORD` | Database password | — |

---

## 🗺 Routes

### Customer

| Method | Route | Description |
|---|---|---|
| GET | `/` | Homepage — featured products |
| GET | `/productos` | Full product catalog |
| GET | `/product/{id}` | Product detail |
| GET | `/about` | About page |
| GET | `/cart` | Shopping cart |
| POST | `/cart/add/{id}` | Add product to cart |
| POST | `/cart/update/{id}` | Update item quantity |
| POST | `/cart/remove/{id}` | Remove item from cart |
| POST | `/cart/checkout` | Complete purchase |

### Auth

| Method | Route | Description |
|---|---|---|
| GET | `/login` | Login page |
| POST | `/login` | Authenticate user |
| GET | `/register` | Registration page |
| POST | `/register` | Create new account |
| POST | `/logout` | Log out |

### Admin (requires `auth` + `admin` middleware)

| Method | Route | Description |
|---|---|---|
| GET | `/admin/dashboard` | Admin dashboard with metrics |
| GET / POST | `/admin/products` | List / create products |
| GET / PUT / DELETE | `/admin/products/{id}` | Show / update / delete product |
| GET / POST | `/admin/categories` | List / create categories |
| GET / PUT / DELETE | `/admin/categories/{id}` | Show / update / delete category |
| GET / POST | `/admin/users` | List / create users |
| GET / PUT / DELETE | `/admin/users/{id}` | Show / update / delete user |
| GET | `/admin/sales` | List all sales |
| GET | `/admin/sales/{id}` | Sale detail |
| GET | `/admin/reports/products` | Export products as PDF |
| GET | `/admin/reports/users` | Export users as PDF |
| GET | `/admin/reports/sales` | Export sales as PDF |

---

## 🌱 Seed Data

The seeders create a complete working dataset:

```bash
php artisan db:seed
```

| Seeder | Description |
|---|---|
| `UserSeeder` | Admin user + sample customers |
| `CategorySeeder` | Sample product categories |
| `ProductSeeder` | Product catalog with images |
| `SaleSeeder` | Sample orders |
| `SaleDetailSeeder` | Order line items |

> After seeding, log in as admin using the credentials defined in `UserSeeder`.

---

<div align="center">
<img src="https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge" alt="License: MIT">
</div>
