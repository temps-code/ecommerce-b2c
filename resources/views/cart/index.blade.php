@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-semibold mb-4">Mi Carrito</h1>

        @if(session()->has('cart') && count(session()->get('cart')) > 0)
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
                    @foreach(session()->get('cart', []) as $productId => $product)
                        @if(is_array($product))
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" class="w-16 h-16 object-cover rounded-md mr-4">
                                        <span class="text-lg font-semibold text-gray-800">{{ $product['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">${{ number_format($product['price'], 2) }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.update', $productId) }}" method="POST" class="flex items-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="form-input w-16 text-center text-sm border rounded-md" />
                                        <button type="submit" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                                            Actualizar
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-gray-600">${{ number_format($product['price'] * $product['quantity'], 2) }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tienes productos en el carrito.</p>
        @endif
    </div>
@endsection
