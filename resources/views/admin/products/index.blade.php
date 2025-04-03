@extends('layouts.admin')

@section('title', 'Gestión de Productos')

@section('content')
<div class="container mx-auto px-4 py-8">
  <!-- Encabezado -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold flex items-center">
      <i class="fas fa-box-open mr-2"></i> Lista de Productos
    </h1>
    <a href="{{ route('admin.products.create') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded inline-flex items-center">
      <i class="fas fa-plus-circle mr-2"></i> Agregar Producto
    </a>
  </div>

  <!-- Filtros -->
  <form method="GET" action="{{ route('admin.products.index') }}" class="mb-6 bg-gray-50 p-4 rounded shadow">
    <div class="flex flex-wrap -mx-2">
      <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
        <label for="search" class="block text-sm font-medium text-gray-700">Buscar por nombre</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nombre del producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
      </div>
      <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
        <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Todas las categorías</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="w-full md:w-1/3 px-2">
        <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Todos</option>
          <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Activo</option>
          <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
        </select>
      </div>
    </div>
    <!-- Contenedor de botones en una misma fila -->
    <div class="mt-4 flex justify-between items-center">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-flex items-center">
        <i class="fas fa-search mr-2"></i> Filtrar
      </button>
      <a href="{{ route('admin.reports.products', request()->all()) }}" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded inline-flex items-center">
        <i class="fa-solid fa-file-pdf mr-2"></i> Generar Reporte PDF
      </a>
    </div>
  </form>

  <!-- Tabla de Productos -->
  <div class="overflow-x-auto mt-6">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Imagen</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nombre</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Categoría</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Precio</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Stock</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Estado</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Acciones</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($products as $product)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                @else
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-200 rounded">
                        <i class="fas fa-image text-gray-500"></i>
                    </div>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $product->category->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($product->price, 2) }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              @if($product->is_active)
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Activo
                </span>
              @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                  Inactivo
                </span>
              @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
              @if($product->is_active)
                <a href="{{ route('admin.products.edit', $product) }}" class="text-yellow-500 hover:text-yellow-700 mr-2" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button class="text-red-500 hover:text-red-700" title="Desactivar" onclick="return confirm('¿Estás seguro de desactivar este producto?');">
                    <i class="fas fa-times-circle"></i>
                  </button>
                </form>
              @else
                <form action="{{ route('admin.products.reactivate', $product->id) }}" method="POST" class="inline-block">
                  @csrf
                  @method('PUT')
                  <button class="text-green-500 hover:text-green-700" title="Reactivar" onclick="return confirm('¿Deseas reactivar este producto?');">
                    <i class="fas fa-check-circle"></i>
                  </button>
                </form>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
              No se encontraron productos.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Paginación -->
  <div class="mt-6">
    {{ $products->links() }}
  </div>
</div>
@endsection
