<div align="center">

<img src="https://raw.githubusercontent.com/temps-code/ecommerce-b2c/main/public/storage/images/user.jpg" alt="E-commerce B2C" width="80%" />

<h1>E-commerce B2C</h1>

<p><strong>Tienda online B2C completa con panel de administración, carrito de compras y reportes PDF — construida con Laravel 12.</strong></p>

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

📄 Leé esto en: [English](README.md) | **Español**

**Proyecto Académico**
Universidad Privada Domingo Savio — Ing. de Sistemas
Materia: Tecnología Web II · 2025

---

## Tabla de Contenidos

- [Vista previa](#-vista-previa)
- [Descripción](#-descripción)
- [Stack](#-stack)
- [Equipo](#-equipo)
- [Arquitectura](#-arquitectura)
- [Instalación](#-instalación)
- [Variables de entorno](#-variables-de-entorno)
- [Rutas](#-rutas)
- [Datos de prueba](#-datos-de-prueba)

---

## 🖼 Vista previa

<div align="center">
  <img src="https://raw.githubusercontent.com/temps-code/ecommerce-b2c/main/public/storage/images/admin.jpg" alt="Panel de administración" width="49%">
  <img src="https://raw.githubusercontent.com/temps-code/ecommerce-b2c/main/public/storage/images/user.jpg" alt="Tienda del cliente" width="49%">
</div>

---

## ✨ Descripción

Plataforma de e-commerce B2C completa que cubre el ciclo entero desde la gestión de productos hasta la compra del cliente.

**Área del cliente:**
- Explorar y buscar el catálogo completo de productos
- Agregar productos al carrito de compras basado en sesión
- Registrarse, iniciar sesión y gestionar el perfil
- Completar compras a través de un flujo de checkout simple

**Panel de administración:**
- Control de acceso por roles (admin / cliente)
- Dashboard en tiempo real con ventas, productos más vendidos y mejores clientes
- CRUD completo para productos, categorías, usuarios y pedidos
- Borrado lógico y reactivación para todas las entidades
- Exportar productos, usuarios y ventas como reportes PDF

---

## 🛠 Stack

| Categoría | Tecnología | Versión |
|---|---|---|
| **Core** | Laravel | 12.x |
| **Core** | PHP | 8.4+ |
| **Base de datos** | MySQL | 8.0+ |
| **Frontend** | Tailwind CSS | 3.x |
| **Frontend** | Alpine.js | 3.x |
| **Frontend** | Bootstrap | 5.x (CDN) |
| **Frontend** | Font Awesome | 6.x (CDN) |
| **Build** | Vite | 6.x |
| **PDF** | DomPDF | 3.1 |
| **Auth** | Laravel Breeze | 2.x |
| **Testing** | PHPUnit | 11.5 |

---

## 👥 Equipo

| Integrante | Rol | Contribuciones |
|---|---|---|
| **Diego Vargas** | Full-Stack Developer | Panel de administración, lógica de negocio, arquitectura del proyecto |
| **Damaris Mamani** | Frontend Developer | Interfaz del cliente, diseño responsive, UX |
| **Yordy Sanchez** | Frontend Developer | Vistas, componentes, integración cliente-servidor |

---

## 🗂 Arquitectura

```
ecommerce-b2c/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Controladores CRUD del admin
│   │   │   ├── Auth/               # Controladores de autenticación
│   │   │   ├── CartController.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/                     # User, Product, Category, Sale, SaleDetail
├── resources/views/
│   ├── admin/                      # Vistas Blade del panel admin
│   ├── home/                       # Vistas de la tienda del cliente
│   ├── cart/                       # Vista del carrito
│   └── layouts/                    # Layouts compartidos
├── routes/
│   ├── web.php                     # Todas las rutas web
│   └── auth.php                    # Rutas de auth (Breeze)
├── database/
│   ├── migrations/                 # Definiciones del esquema
│   ├── factories/                  # Factories de modelos
│   └── seeders/                    # Seeders de la base de datos
└── public/storage/                 # Imágenes subidas de productos
```

---

## ⚙️ Instalación

### Requisitos

- PHP 8.4+
- MySQL 8.0+
- Node.js 18+
- Composer 2.6+

### Pasos

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/temps-code/ecommerce-b2c.git
   cd ecommerce-b2c
   ```

2. Instalar dependencias PHP:
   ```bash
   composer install
   ```

3. Instalar dependencias frontend y compilar assets:
   ```bash
   npm install && npm run build
   ```

4. Copiar y configurar el archivo de entorno:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Actualizar `.env` con tus credenciales de base de datos y luego ejecutar migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Crear el symlink de storage para las imágenes subidas:
   ```bash
   php artisan storage:link
   ```

7. Iniciar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

> La app estará disponible en `http://localhost:8000`.

---

## 🔐 Variables de entorno

Variables clave a configurar en tu archivo `.env`:

| Variable | Descripción | Default |
|---|---|---|
| `APP_URL` | URL base de la aplicación | `http://localhost` |
| `DB_CONNECTION` | Driver de base de datos | `mysql` |
| `DB_HOST` | Host de la base de datos | `127.0.0.1` |
| `DB_PORT` | Puerto de la base de datos | `3306` |
| `DB_DATABASE` | Nombre de la base de datos | — |
| `DB_USERNAME` | Usuario de la base de datos | — |
| `DB_PASSWORD` | Contraseña de la base de datos | — |

---

## 🗺 Rutas

### Cliente

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/` | Inicio — productos destacados |
| GET | `/productos` | Catálogo completo de productos |
| GET | `/product/{id}` | Detalle del producto |
| GET | `/about` | Página "Acerca de" |
| GET | `/cart` | Carrito de compras |
| POST | `/cart/add/{id}` | Agregar producto al carrito |
| POST | `/cart/update/{id}` | Actualizar cantidad |
| POST | `/cart/remove/{id}` | Eliminar producto del carrito |
| POST | `/cart/checkout` | Completar compra |

### Auth

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/login` | Página de inicio de sesión |
| POST | `/login` | Autenticar usuario |
| GET | `/register` | Página de registro |
| POST | `/register` | Crear nueva cuenta |
| POST | `/logout` | Cerrar sesión |

### Admin (requiere middleware `auth` + `admin`)

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/admin/dashboard` | Dashboard con métricas |
| GET / POST | `/admin/products` | Listar / crear productos |
| GET / PUT / DELETE | `/admin/products/{id}` | Ver / actualizar / eliminar producto |
| GET / POST | `/admin/categories` | Listar / crear categorías |
| GET / PUT / DELETE | `/admin/categories/{id}` | Ver / actualizar / eliminar categoría |
| GET / POST | `/admin/users` | Listar / crear usuarios |
| GET / PUT / DELETE | `/admin/users/{id}` | Ver / actualizar / eliminar usuario |
| GET | `/admin/sales` | Listar todas las ventas |
| GET | `/admin/sales/{id}` | Detalle de venta |
| GET | `/admin/reports/products` | Exportar productos como PDF |
| GET | `/admin/reports/users` | Exportar usuarios como PDF |
| GET | `/admin/reports/sales` | Exportar ventas como PDF |

---

## 🌱 Datos de prueba

Los seeders crean un dataset completo y funcional:

```bash
php artisan db:seed
```

| Seeder | Descripción |
|---|---|
| `UserSeeder` | Usuario admin + clientes de prueba |
| `CategorySeeder` | Categorías de productos de ejemplo |
| `ProductSeeder` | Catálogo de productos con imágenes |
| `SaleSeeder` | Pedidos de ejemplo |
| `SaleDetailSeeder` | Líneas de cada pedido |

> Después del seeding, iniciá sesión como admin con las credenciales definidas en `UserSeeder`.

---

<div align="center">
<img src="https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge" alt="License: MIT">
</div>
