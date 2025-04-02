@extends('layouts.admin')

@section('title', 'Crear Categoría')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg">
  <div class="px-6 py-4 border-b border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 flex items-center">
      <i class="fa-solid fa-plus-circle mr-2"></i> Agregar Nueva Categoría
    </h2>
  </div>
  <div class="px-6 py-4">
    <form action="{{ route('admin.categories.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-1">Nombre</label>
        <input type="text" id="name" name="name" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-1">Descripción</label>
        <textarea id="description" name="description" rows="3"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"></textarea>
      </div>
      <div>
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
          <i class="fa-solid fa-save mr-2"></i> Guardar Categoría
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
