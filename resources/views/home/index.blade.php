@extends('layouts.app')

@section('title', 'Inicio - E-Commerce B2C')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 py-8">
    <!-- Sección Hero con Imagen de Fondo - Versión Mejorada -->
    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
        <div class="absolute inset-0 bg-black/30 z-10"></div>
        <img src="https://images.unsplash.com/photo-1550009158-9ebf69173e03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1500&q=80" class="w-full h-[32rem] object-cover" alt="Tecnología de última generación">        <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center px-4">
            <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-xl animate-fade-in-down">
                Bienvenido a <span class="text-yellow-400">E-Commerce B2C</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-100 mb-8 max-w-2xl drop-shadow-md">
                Descubre productos exclusivos y ofertas especiales diseñadas para ti
            </p>
            <a href="{{ route('home.mostrarproductos') }}" 
               class="px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-900 font-bold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                Explorar Productos
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Sección de Qué Ofrecemos - Versión Mejorada -->
    <section class="py-12">
        <div class="text-center mb-12">
            <span class="text-sm font-semibold tracking-wider text-yellow-500 uppercase">Nuestras ventajas</span>
            <h2 class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl">¿Qué Ofrecemos?</h2>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                Todo lo que necesitas en un solo lugar con la mejor experiencia de compra
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <div class="relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border-t-4 border-blue-500">
                <div class="absolute -top-6 left-6 bg-blue-500 p-3 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-3">Productos Premium</h3>
                <p class="text-gray-600">Selección cuidadosa de productos de alta calidad para satisfacer tus necesidades.</p>
            </div>
            
            <div class="relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border-t-4 border-green-500">
                <div class="absolute -top-6 left-6 bg-green-500 p-3 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-3">Precios Imbatibles</h3>
                <p class="text-gray-600">Las mejores ofertas y precios competitivos sin comprometer la calidad.</p>
            </div>
            
            <div class="relative bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border-t-4 border-red-500">
                <div class="absolute -top-6 left-6 bg-red-500 p-3 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-3">Entrega Express</h3>
                <p class="text-gray-600">Recibe tus productos en tiempo récord con nuestro servicio de entrega prioritario.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Productos Destacados - Versión Mejorada -->
    <section class="py-12">
        <div class="text-center mb-12">
            <span class="text-sm font-semibold tracking-wider text-yellow-500 uppercase">Lo más popular</span>
            <h2 class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl">Productos Destacados</h2>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                Descubre nuestros productos más vendidos y mejor valorados
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
            <div class="group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="aspect-w-3 aspect-h-4 w-full overflow-hidden rounded-t-xl">
                    <img src="{{ Storage::url($product->image) }}" 
                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="{{ $product->name }}">
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                        <p class="text-lg font-semibold text-green-600">{{ number_format($product->price, 2) }} Bs</p>
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    
                    <div class="flex justify-between space-x-3">
                        @auth
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" 
                                    class="w-full px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Añadir
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" 
                           class="w-full px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-medium rounded-lg hover:from-gray-600 hover:to-gray-700 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Inicia sesión para tu compra
                        </a>
                        @endauth
                        
                        <a href="{{ route('home.show', $product->id) }}"
                           class="flex-1 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Detalles
                        </a>
                    </div>
                </div>
                <div class="absolute top-4 right-4 bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">
                    DESTACADO
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Sección Call-to-Action - Versión Mejorada -->
    <section class="relative py-16 rounded-2xl overflow-hidden shadow-xl">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-indigo-600 opacity-95"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                ¿Listo para una experiencia de compra excepcional?
            </h2>
            <p class="text-xl text-purple-100 mb-8 max-w-3xl mx-auto">
                Únete a miles de clientes satisfechos y descubre por qué somos la mejor opción para tus compras en línea.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('home.mostrarproductos') }}" 
                   class="px-8 py-3 bg-white text-indigo-600 font-bold rounded-full shadow-lg hover:bg-gray-100 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 text-lg">
                    Comprar Ahora
                </a>
                <a href="{{ route('home.about') }}" 
                   class="px-8 py-3 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:bg-opacity-10 transition-all duration-300 text-lg">
                    Conoce Más
                </a>
            </div>
        </div>
    </section>

    <!-- Mensaje de éxito - Versión Mejorada -->
    @if(session('message'))
        <div class="fixed bottom-6 right-6 z-50">
            <div class="bg-green-50 border-l-4 border-green-500 rounded-lg shadow-lg p-4 w-80 animate-fade-in-up">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('message') }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 flex space-x-3">
                    <a href="{{ route('cart.index') }}" 
                       class="flex-1 px-3 py-1 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 text-center">
                        Ver Carrito
                    </a>
                    <a href="{{ route('home.mostrarproductos') }}" 
                       class="flex-1 px-3 py-1 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 text-center">
                        Seguir Comprando
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection