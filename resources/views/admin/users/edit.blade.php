@extends('layouts.admin')

@section('title', 'Editar Usuario')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg">
  <div class="px-6 py-4 border-b border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 flex items-center">
      <i class="fas fa-edit mr-2"></i> Editar Usuario
    </h2>
  </div>
  <div class="px-6 py-4">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-1">Nombre</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
      </div>
      <!-- Campos para cambio de contraseña -->
      <div class="mb-4 relative">
        <label for="new_password" class="block text-gray-700 font-medium mb-1">Nueva Contraseña <span class="text-sm text-gray-500">(Dejar en blanco para mantener la actual)</span></label>
        <input type="password" id="new_password" name="new_password"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:border-blue-500">
        <button type="button" onclick="togglePassword('new_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
          <i class="fas fa-eye"></i>
        </button>
      </div>
      <div class="mb-4 relative">
        <label for="new_password_confirmation" class="block text-gray-700 font-medium mb-1">Confirmar Nueva Contraseña</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:border-blue-500">
        <button type="button" onclick="togglePassword('new_password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
          <i class="fas fa-eye"></i>
        </button>
      </div>
      <div>
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
          <i class="fas fa-save mr-2"></i> Actualizar Usuario
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Script para alternar la visibilidad de la contraseña -->
<script>
  function togglePassword(fieldId) {
    var input = document.getElementById(fieldId);
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  }
</script>
@endsection
