@extends('layouts.admin')

@section('title', 'Editar Producto')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 flex items-center">
            <i class="fas fa-edit mr-2"></i> Editar Producto
        </h2>
    </div>
    <div class="px-6 py-4">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Nombre del Producto</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <!-- Categoría -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-medium mb-1">Categoría</label>
                <select name="category_id" id="category_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Precio -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-1">Precio</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ $product->price }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <!-- Stock -->
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-medium mb-1">Stock</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <!-- Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-1">Descripción</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">{{ $product->description }}</textarea>
            </div>
            <!-- Imagen -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-1">Imagen del Producto</label>
                @if($product->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                             class="object-cover rounded-lg" style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" id="image" name="image" class="w-full">
                <p class="text-sm text-gray-500 mt-1">Sube una nueva imagen para reemplazar la actual.</p>
            </div>
            <!-- Botón -->
            <div>
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-save mr-2"></i> Actualizar Producto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
