@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-12">Nuestros Productos</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach ($products as $product)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative pb-2/3 h-60">
                    <img src="{{ Storage::url($product->image_path) }}" 
                         class="absolute h-full w-full object-cover transform hover:scale-105 transition duration-500"
                         alt="{{ $product->name }}">
                </div>
                
                <div class="p-6">
                    <div class="flex items-baseline">
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-indigo-500 rounded-full">{{ $product->category->name ?? 'General' }}</span>
                    </div>
                    
                    <h2 class="mt-2 text-xl font-bold text-gray-900">{{ $product->name }}</h2>
                    <p class="mt-2 text-gray-600 line-clamp-2">{{ $product->description }}</p>
                    
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-2xl font-bold text-green-600">{{ number_format($product->price, 2) }} Bs</span>
                        @if($product->stock > 0)
                            <span class="text-sm text-green-500">Disponible</span>
                        @else
                            <span class="text-sm text-red-500">Agotado</span>
                        @endif
                    </div>

                    <div class="mt-6 space-y-3">
                        @auth
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="redirect_to_cart" value="false">
                                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition-all shadow-md hover:shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                    Añadir al carrito
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all shadow-md hover:shadow-lg">
                                Iniciar sesión para comprar
                            </a>
                        @endauth

                        <a href="{{ route('home.show', $product->id) }}" class="block w-full text-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            Ver detalles
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection