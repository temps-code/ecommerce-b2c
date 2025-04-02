@extends('layouts.admin')

@section('title', 'Crear Producto')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 flex items-center">
            <i class="fas fa-plus-circle mr-2"></i> Agregar Nuevo Producto
        </h2>
    </div>
    <div class="px-6 py-4">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Nombre del Producto</label>
                <input type="text" id="name" name="name" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-medium mb-1">Categoría</label>
                <select name="category_id" id="category_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-1">Precio</label>
                <input type="number" step="0.01" id="price" name="price" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-medium mb-1">Stock</label>
                <input type="number" id="stock" name="stock" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-1">Descripción</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-1">Imagen del Producto</label>
                <input type="file" id="image" name="image" class="w-full">
                <p class="text-sm text-gray-500 mt-1">Sube una imagen para el producto.</p>
            </div>
            <div>
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-save mr-2"></i> Guardar Producto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
