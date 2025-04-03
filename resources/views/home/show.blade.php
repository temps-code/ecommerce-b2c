@extends('layouts.app')

@section('title', 'Detalles del Producto')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
        <!-- Product Image with Floating Badge -->
        <div class="relative group">
            <img src="{{ asset('storage/' . $product->image_path) }}" 
                alt="{{ $product->name }}" 
                class="w-full h-96 object-cover object-center transition-transform duration-500 group-hover:scale-105">
            <!-- Floating Product Name -->
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                <h1 class="text-3xl md:text-4xl font-bold text-white">{{ $product->name }}</h1>
                @if($product->category)
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-semibold text-white bg-indigo-500 rounded-full">
                        {{ $product->category->name }}
                    </span>
                @endif
            </div>
        </div>

        <!-- Product Details -->
        <div class="p-8">
            <!-- Description -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Descripción</h2>
                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
            </div>

            <!-- Price and Actions -->
            <div class="flex flex-col md:flex-row items-center justify-between border-t border-gray-100 pt-8">
                <!-- Price -->
                <div class="mb-4 md:mb-0">
                    <span class="block text-sm font-medium text-gray-500">Precio</span>
                    <p class="text-4xl font-extrabold text-green-600">
                        {{ number_format($product->price, 2) }} <span class="text-xl">Bs</span>
                    </p>
                    @if($product->stock > 0)
                        <span class="inline-flex items-center mt-1 text-sm text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Disponible
                        </span>
                    @else
                        <span class="inline-flex items-center mt-1 text-sm text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            Agotado
                        </span>
                    @endif
                </div>

                <!-- Add to Cart Button -->
                @if($product->stock > 0)
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full md:w-auto">
                    @csrf
                    <button type="submit" 
                            class="w-full px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-lg hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                        Añadir al Carrito
                    </button>
                </form>
                @endif
            </div>

            <!-- Back to Catalog -->
            <div class="mt-12 text-center">
                <a href="{{ route('home.mostrarproductos') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-green-600 transition-colors duration-200 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Volver al Catálogo
                </a>
            </div>
        </div>
    </div>
</div>
@endsection