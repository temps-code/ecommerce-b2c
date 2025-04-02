@extends('layouts.app')

@section('title', 'Sobre Nosotros - E-Commerce B2C')

@section('content')
    <div class="container py-10">
        <h2
            class="text-4xl font-bold text-center mb-5 text-gradient bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-blue-500">
            Sobre Nosotros
        </h2>
        <p class="text-lg mb-5 text-gray-700">
            En E-Commerce B2C, nos dedicamos a ofrecer los mejores productos a precios competitivos. Nuestra misión es
            brindar
            una experiencia de compra en línea sencilla y segura. Trabajamos con los mejores proveedores para asegurarnos de
            que
            nuestros clientes siempre tengan acceso a lo último en tecnología, moda, y mucho más.
        </p>
        <div
            class="bg-gradient-to-r from-gray-200 via-gray-300 to-gray-400 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 mb-6">
            <h3 class="text-3xl font-semibold text-center text-green-600 mb-4">Nuestra Misión</h3>
            <p class="text-lg text-gray-700 text-center">
                Ofrecer productos de alta calidad a nuestros clientes, con un enfoque en la satisfacción del cliente y un
                excelente
                servicio de entrega.
            </p>
        </div>
        <a href="{{ route('home') }}"
            class="btn btn-success px-6 py-3 text-white font-semibold bg-gradient-to-r from-green-500 to-blue-500 hover:bg-gradient-to-r hover:from-green-600 hover:to-blue-600 rounded-lg transform hover:scale-105 transition-all duration-300">
            Volver al Inicio
        </a>

    </div>
@endsection