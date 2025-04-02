@extends('layouts.admin')

@section('title', 'Gestión de Ventas')

@section('content')
<div class="container mx-auto px-4 py-8">
  <!-- Encabezado -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold flex items-center">
      <i class="fa-solid fa-cart-shopping mr-2"></i> Lista de Ventas
    </h1>
    <!-- Si se requiere crear ventas manualmente, se puede habilitar el siguiente botón -->
    {{-- <a href="{{ route('admin.sales.create') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded inline-flex items-center">
      <i class="fa-solid fa-plus-circle mr-2"></i> Agregar Venta
    </a> --}}
  </div>

  <!-- Filtros -->
  <form method="GET" action="{{ route('admin.sales.index') }}" class="mb-6 bg-gray-50 p-4 rounded shadow">
    <div class="flex flex-wrap -mx-2">
      <!-- Buscador por ID o Email del usuario -->
      <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
        <label for="search" class="block text-sm font-medium text-gray-700">Buscar (ID o Usuario)</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Buscar venta..."
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
      </div>
      <!-- Filtro por Estado -->
      <div class="w-full md:w-1/3 px-2">
        <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Todos</option>
          <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Activo</option>
          <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
        </select>
      </div>
    </div>
    <div class="mt-4">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-flex items-center">
        <i class="fa-solid fa-search mr-2"></i> Filtrar
      </button>
    </div>
  </form>

  <!-- Tabla de Ventas -->
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID Venta</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Usuario</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Total</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Fecha de Venta</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Estado</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Acciones</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($sales as $sale)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $sale->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $sale->user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($sale->calculated_total, 2) }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y H:i') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
              @if($sale->is_active)
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
              <a href="{{ route('admin.sales.show', $sale) }}" class="text-blue-500 hover:text-blue-700 mr-2" title="Ver Detalles">
                <i class="fa-solid fa-eye"></i>
              </a>
              @if($sale->is_active)
                <form action="{{ route('admin.sales.destroy', $sale) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de desactivar esta venta?');">
                  @csrf
                  @method('DELETE')
                  <button class="text-red-500 hover:text-red-700" title="Desactivar">
                    <i class="fa-solid fa-times-circle"></i>
                  </button>
                </form>
              @else
                <form action="{{ route('admin.sales.reactivate', $sale->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Deseas reactivar esta venta?');">
                  @csrf
                  @method('PUT')
                  <button class="text-green-500 hover:text-green-700" title="Reactivar">
                    <i class="fa-solid fa-check-circle"></i>
                  </button>
                </form>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
              No se encontraron ventas.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Paginación -->
  <div class="mt-6">
    {{ $sales->links() }}
  </div>
</div>
@endsection
