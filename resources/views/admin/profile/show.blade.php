@extends('layouts.admin')

@section('title', 'Perfil del Administrador')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
    <!-- Encabezado con ícono y datos básicos -->
    <div class="flex items-center border-b pb-6 mb-6">
        <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fa-solid fa-user fa-3x text-white"></i>
        </div>
        <div class="ml-6">
            <h2 class="text-3xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
            <p class="text-gray-600">{{ auth()->user()->email }}</p>
            <p class="mt-1 text-sm text-gray-500 capitalize">Rol: {{ auth()->user()->role }}</p>
        </div>
    </div>

    <!-- Detalles del perfil en cuadrícula -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm font-medium text-gray-600">Estado</p>
            @if(auth()->user()->is_active)
                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Activo</span>
            @else
                <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">Inactivo</span>
            @endif
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Correo verificado</p>
            @if(auth()->user()->email_verified_at)
                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Sí</span>
            @else
                <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">No</span>
            @endif
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Registrado</p>
            <p class="text-gray-800">{{ auth()->user()->created_at->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Última actualización</p>
            <p class="text-gray-800">{{ auth()->user()->updated_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <!-- Sección descriptiva -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Perfil de Administrador</h3>
        <p class="text-gray-600">
            Este es el perfil de administrador del sistema. Aquí se muestran los detalles básicos de tu cuenta de administrador. Utiliza el botón de edición para actualizar tu información, cambiar tu contraseña o modificar tus datos de contacto.
        </p>
    </div>

    <!-- Botón para editar perfil -->
    <div class="mt-8 flex justify-end">
        <a href="{{ route('admin.profile.edit') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded inline-flex items-center">
            <i class="fa-solid fa-edit mr-2"></i> Editar Perfil
        </a>
    </div>
</div>
@endsection
