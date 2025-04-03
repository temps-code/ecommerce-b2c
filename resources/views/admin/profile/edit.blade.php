@extends('layouts.admin')

@section('title', 'Editar Perfil del Administrador')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-xl rounded-xl p-8">
    <div class="flex items-center border-b pb-4 mb-6">
        <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fa-solid fa-user fa-2x text-white"></i>
        </div>
        <div class="ml-4">
            <h2 class="text-3xl font-bold text-gray-800">Editar Perfil</h2>
            <p class="text-gray-500">Actualiza tus datos y cambia tu contraseña</p>
        </div>
    </div>

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">
          {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Campo Nombre -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Ingresa tu nombre">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Campo Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Ingresa tu email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Contraseña actual -->
        <div class="mt-6">
            <label for="current_password" class="block text-gray-700 font-medium mb-1">Contraseña actual</label>
            <input type="password" id="current_password" name="current_password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Ingresa tu contraseña actual">
            @error('current_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nueva contraseña -->
        <div class="mt-6">
            <label for="password" class="block text-gray-700 font-medium mb-1">
                Nueva contraseña <span class="text-sm text-gray-500">(dejar en blanco para mantener la actual)</span>
            </label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Ingresa tu nueva contraseña">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirmar nueva contraseña -->
        <div class="mt-6">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirmar nueva contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Confirma tu nueva contraseña">
        </div>

        <!-- Botones -->
        <div class="flex justify-between items-center mt-8">
            <a href="{{ route('admin.profile.show') }}" class="text-blue-500 hover:underline flex items-center">
                <i class="fa-solid fa-arrow-left mr-1"></i> Volver al perfil
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded inline-flex items-center transition duration-200">
                <i class="fa-solid fa-save mr-2"></i> Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
