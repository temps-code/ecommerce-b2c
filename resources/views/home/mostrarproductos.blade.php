@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de Productos</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-lg p-4">
                <img src="{{ Storage::url($product->image_path) }}" class="w-full h-48 object-cover rounded-md" alt="{{ $product->name }}">
                <h2 class="text-xl font-semibold mt-3">{{ $product->name }}</h2>
                <p class="text-gray-600">{{ $product->description }}</p>
                <p class="text-lg font-bold text-green-600">${{ $product->price }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="redirect_to_cart" value="false">
                    <button type="submit" class="mt-2 w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition">
                        Agregar al Carrito
                    </button>
                </form>

                <a href="{{ route('admin.products.show', $product->id) }}" class="block text-center bg-blue-500 text-white py-2 rounded-md mt-2 hover:bg-blue-600 transition">
                    Ver Detalles
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
