@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-semibold text-center mb-6">🛒 Mi Carrito</h1>

        @if(session()->has('cart') && is_array(session('cart')) && count(session('cart')) > 0)
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-left">Producto</th>
                        <th class="px-6 py-4 text-left">Precio</th>
                        <th class="px-6 py-4 text-left">Cantidad</th>
                        <th class="px-6 py-4 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart', []) as $productId => $product)
                        @if(is_array($product))
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}"
                                            class="w-16 h-16 object-cover rounded-md mr-4">
                                        <span class="text-lg font-semibold text-gray-800">{{ $product['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ number_format($product['price'], 2) }} Bs</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.update', $productId) }}" method="POST" class="flex items-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1"
                                            class="form-input w-16 text-center text-sm border rounded-md" />
                                        <button type="submit"
                                            class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                                            Actualizar
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    {{ number_format($product['price'] * $product['quantity'], 2) }} Bs
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline">← Seguir comprando</a>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-md text-lg font-semibold hover:bg-green-700 transition">
                        🛍 Comprar ahora
                    </button>
                </form>
            </div>
        @else
            <p class="text-center text-gray-600">No tienes productos en el carrito.</p>
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition">
                    🛒 Explorar productos
                </a>
            </div>
        @endif
    </div>
@endsection