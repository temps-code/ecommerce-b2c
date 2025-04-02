@extends('layouts.app')

@section('title', 'Detalles del Producto')

@section('content')
<div class="container mx-auto py-12 px-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl mx-auto">
        <!-- Imagen del producto -->
        <div class="relative">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover object-center transition-transform duration-500 transform hover:scale-105 rounded-t-lg">
            <div class="absolute top-0 left-0 p-4 bg-black bg-opacity-50 text-white rounded-t-lg">
                <h1 class="text-3xl font-extrabold">{{ $product->name }}</h1>
            </div>
        </div>

        <!-- Información del producto -->
        <div class="p-6">
            <p class="text-gray-700 text-lg">{{ $product->description }}</p>

            <!-- Precio -->
            <div class="flex items-center justify-between mt-6">
                <p class="text-3xl font-bold text-green-600">Precio: ${{ number_format($product->price, 2) }}</p>

                <!-- Botón para agregar al carrito -->
                <a href="{{ route('cart.add', $product->id) }}" class="inline-block bg-green-600 text-white text-lg font-semibold py-2 px-6 rounded-md hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-105">
                    Agregar al carrito
                </a>
            </div>

            <!-- Enlace de regreso al catálogo -->
            <div class="mt-8 text-center">
                <a href="{{ route('products.index') }}" class="text-lg text-gray-700 hover:text-green-600 transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i> Volver al Catálogo
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
