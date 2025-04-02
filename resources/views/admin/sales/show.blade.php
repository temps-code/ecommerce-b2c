@extends('layouts.admin')

@section('title', 'Detalles de Venta')

@section('content')
<div class="container mx-auto px-4 py-8">
  <!-- Información de la Venta -->
  <div class="bg-white shadow rounded-lg p-6 mb-6">
    <h2 class="text-2xl font-bold mb-4">Detalles de la Venta #{{ $sale->id }}</h2>
    <p><strong>Usuario:</strong> {{ $sale->user->name }} ({{ $sale->user->email }})</p>
    <p><strong>Total:</strong> ${{ number_format($sale->calculated_total, 2) }}</p>
    <p><strong>Fecha de Venta:</strong> {{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y H:i') }}</p>
    <p>
      <strong>Estado:</strong>
      @if($sale->is_active)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
          Activo
        </span>
      @else
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
          Inactivo
        </span>
      @endif
    </p>
  </div>

  <!-- Detalles de la Venta (Productos) -->
  <div class="bg-white shadow rounded-lg p-6">
    <h3 class="text-xl font-bold mb-4">Productos Comprados</h3>
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Producto</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Cantidad</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Precio Unitario</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Subtotal</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($sale->saleDetails as $detail)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">{{ $detail->product->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $detail->quantity }}</td>
              <td class="px-6 py-4 whitespace-nowrap">${{ number_format($detail->unit_price, 2) }}</td>
              <td class="px-6 py-4 whitespace-nowrap">${{ number_format($detail->quantity * $detail->unit_price, 2) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Botón para volver al listado -->
  <div class="mt-6">
    <a href="{{ route('admin.sales.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-flex items-center">
      <i class="fa-solid fa-arrow-left mr-2"></i> Volver al listado de ventas
    </a>
  </div>
</div>
@endsection
