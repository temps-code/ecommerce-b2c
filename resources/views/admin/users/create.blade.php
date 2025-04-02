@extends('layouts.admin')

@section('title', 'Crear Usuario')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg">
  <div class="px-6 py-4 border-b border-gray-200">
    <h2 class="text-xl font-semibold text-gray-700 flex items-center">
      <i class="fa-solid fa-user-plus mr-2"></i> Agregar Nuevo Usuario
    </h2>
  </div>
  <div class="px-6 py-4">
    <form action="{{ route('admin.users.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-1">Nombre</label>
        <input type="text" id="name" name="name" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
      </div>
      <!-- Campo de contraseña con toggle -->
      <div class="mb-4 relative">
        <label for="password" class="block text-gray-700 font-medium mb-1">Contraseña</label>
        <input type="password" id="password" name="password" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:border-blue-500">
        <span onclick="togglePassword('password', 'icon_password')" class="absolute right-0 top-1/2 transform -translate-y-1/2 pr-3 flex items-center cursor-pointer text-gray-500">
            <i id="icon_password" class="fa-solid fa-eye"></i>
        </span>
      </div>
      <!-- Campo de confirmación de contraseña con toggle -->
      <div class="mb-4 relative">
        <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:border-blue-500">
        <span onclick="togglePassword('password_confirmation', 'icon_password_confirmation')" class="absolute right-0 top-1/2 transform -translate-y-1/2 pr-3 flex items-center cursor-pointer text-gray-500">
            <i id="icon_password_confirmation" class="fa-solid fa-eye"></i>
        </span>
      </div>
      <div>
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
          <i class="fa-solid fa-save mr-2"></i> Guardar Usuario
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function togglePassword(fieldId, iconId) {
    const input = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
@endsection
