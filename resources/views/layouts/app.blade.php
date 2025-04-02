<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce B2C')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <!-- Navbar -->
    <header class="bg-gray-900 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold">E-Commerce B2C</a>

            <!-- Botón menú hamburguesa (móvil) -->
            <button id="menu-toggle" class="block md:hidden focus:outline-none">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <!-- Menú de navegación -->
            <nav id="menu" class="hidden md:flex md:items-center space-x-6">
                <a href="{{ url('/') }}" class="hover:text-gray-300 transition">Inicio</a>
                <a href="{{ route('home.mostrarproductos') }}" class="hover:text-gray-300 transition">Productos</a>
                <a href="{{ url('/cart') }}" class="hover:text-gray-300 transition">Carrito</a>
                <a href="{{ url('/profile') }}" class="hover:text-gray-300 transition">Perfil</a>
            </nav>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 text-white py-4 space-y-2">
            <a href="{{ url('/') }}" class="block text-center py-2 hover:bg-gray-700">Inicio</a>
            <a href="{{ url('/admin/products') }}" class="block text-center py-2 hover:bg-gray-700">Productos</a>
            <a href="{{ url('/cart') }}" class="block text-center py-2 hover:bg-gray-700">Carrito</a>
            <a href="{{ url('/profile') }}" class="block text-center py-2 hover:bg-gray-700">Perfil</a>
        </div>
    </header>

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4 mt-8">
        <p>&copy; {{ date('Y') }} E-Commerce B2C. Todos los derechos reservados.</p>
    </footer>

    <!-- Script para menú móvil -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>

</html>