<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel de Administración')</title>
    <!-- Iconos de Font Awesome (versión estable) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Menú de navegación -->
    <nav class="bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo y navegación principal -->
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white text-xl font-bold">
                        Admin Panel
                    </a>
                    <div class="hidden md:block ml-8">
                        <div class="flex space-x-6">
                            <a href="{{ route('admin.products.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Productos
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Usuarios
                            </a>
                            <a href="{{ route('admin.categories.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Categorías
                            </a>
                            <a href="{{ route('admin.sales.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Ventas
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Opciones de usuario y menú móvil -->
                <div class="flex items-center">
                    @auth
                    <div class="hidden md:flex items-center space-x-4">
                        <span class="text-gray-300">Bienvenido, {{ auth()->user()->name }}</span>
                        <div class="relative">
                            <button onclick="document.getElementById('user-menu').classList.toggle('hidden')" class="flex items-center text-gray-300 hover:text-white focus:outline-none">
                                <i class="fa-solid fa-user-circle fa-lg"></i>
                            </button>
                            <!-- Menú desplegable -->
                            <div id="user-menu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white hidden z-10">
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Perfil
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Cerrar sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    <div class="md:hidden flex items-center">
                        @auth
                        <button onclick="document.getElementById('mobile-user-menu').classList.toggle('hidden')" class="text-gray-300 hover:text-white focus:outline-none mr-2">
                            <i class="fa-solid fa-user-circle fa-lg"></i>
                        </button>
                        @endauth
                        <button type="button" class="text-gray-300 hover:text-white focus:outline-none">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menú móvil de usuario -->
        @auth
        <div id="mobile-user-menu" class="md:hidden bg-gray-700 hidden">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">
                Perfil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-600">
                    Cerrar sesión
                </button>
            </form>
        </div>
        @endauth
    </nav>

    <!-- Contenedor para mensajes flash y errores -->
    <div class="max-w-7xl mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Contenedor principal -->
    <main class="max-w-7xl mx-auto p-4">
        @yield('content')
    </main>

    <!-- Footer opcional -->
    <footer class="bg-gray-800 text-gray-300 text-center py-4 mt-8">
        &copy; {{ date('Y') }} Panel de Administración. Todos los derechos reservados.
    </footer>

    <!-- Script opcional para cerrar el menú desplegable de usuario -->
    <script>
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            if (userMenu && !userMenu.contains(event.target) && !event.target.closest('.fa-user-circle')) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
