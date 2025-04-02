@extends('layouts.app')

@section('title', 'Inicio - E-Commerce B2C')

@section('content')
<div class="max-w-6xl mx-auto mt-10 space-y-12">
    <!-- Sección Hero con Imagen de Fondo -->
    <div class="relative mb-10">
        <img src="{{ Storage::url('products/slider1.jpg') }}" class="w-full h-96 object-cover rounded-lg shadow-lg" alt="Hero Image">
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-r from-black to-transparent text-white p-6">
            <h2 class="text-5xl font-bold drop-shadow-lg">Bienvenido a E-Commerce B2C</h2>
            <p class="text-lg mt-2">Descubre productos exclusivos y ofertas especiales</p>
            <a href="{{ route('admin.products.index') }}" class="mt-4 px-6 py-3 bg-yellow-500 text-black font-semibold rounded-lg shadow-md hover:bg-yellow-600 transform hover:scale-105 transition-all duration-300">
                Explorar Productos
            </a>
        </div>
    </div>

    <!-- Sección de Qué Ofrecemos -->
    <section class="my-16">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">¿Qué Ofrecemos?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-blue-500 text-white shadow-xl rounded-lg p-6 transform hover:scale-105 transition-all duration-300">
                <h3 class="text-2xl font-semibold mb-3">Productos de Calidad</h3>
                <p>Encuentra productos seleccionados cuidadosamente para ofrecerte lo mejor del mercado.</p>
            </div>
            <div class="bg-green-500 text-white shadow-xl rounded-lg p-6 transform hover:scale-105 transition-all duration-300">
                <h3 class="text-2xl font-semibold mb-3">Precios Competitivos</h3>
                <p>Aprovecha nuestras ofertas y compra productos de calidad al mejor precio.</p>
            </div>
            <div class="bg-red-500 text-white shadow-xl rounded-lg p-6 transform hover:scale-105 transition-all duration-300">
                <h3 class="text-2xl font-semibold mb-3">Entrega Rápida</h3>
                <p>Disfruta de un servicio de entrega eficiente para que recibas tus productos rápidamente.</p>
            </div>
        </div>
    </section>

    <!-- Sección Enlaces de Información -->
    <section class="bg-gray-100 py-10 text-center rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-5">Más Información</h2>
        <p class="text-lg mb-5">Conoce más sobre nosotros o contáctanos si tienes alguna duda.</p>
        <a href="{{ route('home.about') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">
            Sobre Nosotros
        </a>
    </section>

    <!-- Sección de Productos Destacados -->
    <section class="my-16">
        <h2 class="text-4xl font-bold text-center mb-6 text-gray-800">Productos Destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div class="bg-white shadow-xl rounded-lg p-6 transform hover:scale-105 transition-all duration-300 border-l-4 border-blue-500">
                    <img src="{{ Storage::url($product->image) }}" class="w-full h-48 object-cover mb-4 rounded-lg" alt="{{ $product->name }}">
                    <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-green-600 font-semibold text-xl">${{ $product->price }}</p>
                    <div class="mt-4 flex justify-between">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transform hover:scale-105 transition-all duration-300">
                                Agregar al Carrito
                            </button>
                        </form>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transform hover:scale-105 transition-all duration-300">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Sección Call-to-Action -->
    <section class="bg-gradient-to-r from-green-500 to-blue-500 py-10 text-center text-white rounded-lg shadow-lg">
        <h2 class="text-4xl font-bold mb-5">¿Listo para comprar?</h2>
        <p class="text-lg mb-5">Explora nuestro catálogo y descubre ofertas exclusivas solo para ti.</p>
        <a href="{{ route('home.mostrarproductos') }}" class="px-6 py-3 bg-yellow-400 text-black font-semibold rounded-lg shadow-md hover:bg-yellow-500 transform hover:scale-105 transition-all duration-300">
            Comprar Ahora
        </a>
    </section>

    <!-- Mensaje de éxito -->
    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg mt-6" role="alert">
            <p>{{ session('message') }}</p>
            <div class="mt-3 flex justify-between">
                <a href="{{ route('cart.index') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transform hover:scale-105 transition-all duration-300">
                    Ir al carrito
                </a>
                <a href="{{ route('home.mostrarproductos') }}" class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 transform hover:scale-105 transition-all duration-300">
                    Seguir comprando
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
