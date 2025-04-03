@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mx-auto px-4 py-8">
  <!-- Encabezado -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold flex items-center">
      <i class="fas fa-users mr-2"></i> Listado de Usuarios
    </h1>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-flex items-center">
      <i class="fas fa-user-plus mr-2"></i> Agregar Usuario
    </a>
  </div>

  <!-- Filtros y Búsqueda -->
  <form method="GET" action="{{ route('admin.users.index') }}" class="mb-6 bg-gray-50 p-4 rounded shadow">
    <div class="flex flex-wrap -mx-2">
      <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
        <label for="search" class="block text-sm font-medium text-gray-700">
          Buscar por nombre o email
        </label>
        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Buscar..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
      </div>
      <div class="w-full md:w-1/2 px-2">
        <label for="status" class="block text-sm font-medium text-gray-700">
          Estado
        </label>
        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Todos</option>
          <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Activo</option>
          <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
        </select>
      </div>
    </div>
    <div class="mt-4 flex justify-between">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded inline-flex items-center">
        <i class="fas fa-search mr-2"></i> Filtrar
      </button>
      <!-- Botón para generar reporte PDF -->
      <a href="{{ route('admin.reports.users', request()->all()) }}" class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded inline-flex items-center">
        <i class="fa-solid fa-file-pdf mr-2"></i> Generar Reporte PDF
      </a>
    </div>
  </form>

  <!-- Tabla de Usuarios -->
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nombre</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Email</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Estado</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Acciones</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($users as $user)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">
            @if($user->is_active)
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
            @if($user->is_active)
              <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-500 hover:text-yellow-700 mr-2" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de dar de baja este usuario?');">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:text-red-700" title="Dar de baja">
                  <i class="fas fa-ban"></i>
                </button>
              </form>
            @else
              <form action="{{ route('admin.users.reactivate', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Deseas reactivar este usuario?');">
                @csrf
                @method('PUT')
                <button class="text-green-500 hover:text-green-700" title="Reactivar">
                  <i class="fas fa-check-circle"></i>
                </button>
              </form>
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-6 py-4 text-center text-gray-500">No se encontraron usuarios.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Paginación -->
  <div class="mt-6">
    {{ $users->links() }}
  </div>
</div>
@endsection
