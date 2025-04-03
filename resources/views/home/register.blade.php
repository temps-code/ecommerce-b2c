@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-semibold text-center mb-4">Registrarse</h2>

            @if (session('error'))
                <div class="bg-red-500 text-white p-2 rounded mb-3">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" required
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" required
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" required
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                    Registrarse
                </button>
            </form>

            <div class="mt-4 text-center">
                <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>
@endsection