@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
            <!-- Encabezado con imagen -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-32"></div>

            <div class="p-6 relative">
                <!-- Foto de perfil (Por defecto, un avatar) -->
                <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&size=100&background=random&color=fff"
                        class="rounded-full border-4 border-white shadow-lg">
                </div>

                <!-- Información del usuario -->
                <div class="mt-12 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    <p class="text-sm text-gray-500">Miembro desde: {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                </div>

                <!-- Opciones del perfil -->
                <div class="mt-6 grid grid-cols-2 gap-4 text-center">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold">Historial de Compras</h3>
                        <p class="text-gray-500">Ver tus pedidos</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold">Métodos de Pago</h3>
                        <p class="text-gray-500">Gestiona tus tarjetas</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold">Dirección de Envío</h3>
                        <p class="text-gray-500">Actualizar dirección</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold">Notificaciones</h3>
                        <p class="text-gray-500">Configurar alertas</p>
                    </div>
                </div>

                <!-- Botón de Cerrar Sesión -->
                <div class="mt-6 text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection