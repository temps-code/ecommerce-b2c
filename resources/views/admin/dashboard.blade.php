@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="py-8">
  <div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-gray-800">Bienvenido al Panel de Administración</h1>
    <p class="mt-2 text-lg text-gray-600">Gestiona la aplicación y consulta estadísticas generales.</p>
  </div>

  <!-- Tarjetas de Estadísticas Básicas -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Tarjeta de Usuarios -->
    <a href="{{ route('admin.users.index') }}" class="block">
      <div class="bg-white shadow rounded-lg p-6 hover:shadow-xl transition duration-300">
        <div class="flex items-center">
          <div class="bg-blue-100 p-3 rounded-full">
            <i class="fa-solid fa-users text-blue-500 text-2xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Usuarios</p>
            <p class="text-2xl font-semibold text-gray-700">{{ $userCount }}</p>
          </div>
        </div>
      </div>
    </a>
    <!-- Tarjeta de Ventas -->
    <a href="{{ route('admin.sales.index') }}" class="block">
      <div class="bg-white shadow rounded-lg p-6 hover:shadow-xl transition duration-300">
        <div class="flex items-center">
          <div class="bg-green-100 p-3 rounded-full">
            <i class="fa-solid fa-cart-shopping text-green-500 text-2xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Ventas</p>
            <p class="text-2xl font-semibold text-gray-700">{{ $salesCount }}</p>
          </div>
        </div>
      </div>
    </a>
    <!-- Tarjeta de Productos -->
    <a href="{{ route('admin.products.index') }}" class="block">
      <div class="bg-white shadow rounded-lg p-6 hover:shadow-xl transition duration-300">
        <div class="flex items-center">
          <div class="bg-yellow-100 p-3 rounded-full">
            <i class="fa-solid fa-box-open text-yellow-500 text-2xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Productos</p>
            <p class="text-2xl font-semibold text-gray-700">{{ $productCount }}</p>
          </div>
        </div>
      </div>
    </a>
    <!-- Tarjeta de Categorías -->
    <a href="{{ route('admin.categories.index') }}" class="block">
      <div class="bg-white shadow rounded-lg p-6 hover:shadow-xl transition duration-300">
        <div class="flex items-center">
          <div class="bg-purple-100 p-3 rounded-full">
            <i class="fa-solid fa-tags text-purple-500 text-2xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Categorías</p>
            <p class="text-2xl font-semibold text-gray-700">{{ $categoryCount }}</p>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Últimas Ventas -->
  <div class="mt-12">
    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Últimas Ventas</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Usuario</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Total</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Fecha</th>
              <th class="px-4 py-2 text-center text-xs font-medium text-gray-600 uppercase">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @forelse($latestSales as $sale)
              <tr>
                <td class="px-4 py-2 whitespace-nowrap">{{ $sale->id }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $sale->user->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap">${{ number_format($sale->calculated_total, 2) }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y H:i') }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-center">
                  <a href="{{ route('admin.sales.show', $sale) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded inline-flex items-center text-xs" title="Ver Detalles">
                    <i class="fa-solid fa-eye mr-1"></i> Ver Detalles
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-4 py-2 text-center text-gray-500">No se encontraron ventas recientes.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Productos más vendidos -->
  <div class="mt-12">
    <div class="bg-white shadow rounded-lg p-6">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Productos Más Vendidos</h2>
        <!-- Puedes agregar otro botón aquí para ver todos, si se desea -->
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Producto</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Categoría</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Cantidad Vendida</th>
              <th class="px-4 py-2 text-center text-xs font-medium text-gray-600 uppercase">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @forelse($topProducts as $product)
              <tr>
                <td class="px-4 py-2 whitespace-nowrap">{{ $product->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $product->category->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $product->sale_details_sum_quantity ?? 0 }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-center">
                  <a href="{{ route('admin.products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded inline-flex items-center text-xs" title="Ver Detalles">
                    <i class="fa-solid fa-eye mr-1"></i> Ver Detalles
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="px-4 py-2 text-center text-gray-500">No se encontraron datos.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Usuarios con más compras -->
  <div class="mt-12">
    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Usuarios con Más Compras</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Usuario</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Correo</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Compras</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @forelse($topUsers as $user)
              <tr>
                <td class="px-4 py-2 whitespace-nowrap">{{ $user->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $user->email }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $user->sales_count }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="px-4 py-2 text-center text-gray-500">No se encontraron datos.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
