@extends('layouts.app')

@section('title', 'Sobre Nosotros - E-Commerce B2C')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-red-500">
                Conoce Nuestra Historia
            </span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Más que una tienda, somos tu aliado en compras inteligentes con productos seleccionados cuidadosamente para ti.
        </p>
    </div>

    <!-- About Content -->
    <div class="grid md:grid-cols-2 gap-12 mb-20">
        <!-- Main About Text -->
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Nuestra Esencia</h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    En E-Commerce B2C, nos apasiona conectar a nuestros clientes con los mejores productos del mercado. 
                    Desde nuestros humildes comienzos en 2023, hemos crecido gracias a la confianza de miles de clientes 
                    que valoran nuestra dedicación a la calidad y servicio excepcional.
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Cada producto en nuestro catálogo pasa por un riguroso proceso de selección para garantizar que solo 
                    ofrecemos lo mejor. Nuestro equipo está compuesto por expertos en diversas áreas que comparten un 
                    mismo objetivo: tu satisfacción.
                </p>
            </div>

            <!-- Values -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-yellow-50 to-red-50 p-6 rounded-xl border border-yellow-100">
                    <div class="text-yellow-500 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">Calidad Garantizada</h3>
                    <p class="text-gray-600 text-sm">Productos verificados por expertos</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-blue-50 p-6 rounded-xl border border-purple-100">
                    <div class="text-purple-500 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">Entrega Rápida</h3>
                    <p class="text-gray-600 text-sm">Envíos en 24-48 horas</p>
                </div>
            </div>
        </div>

        <!-- Mission Card -->
        <div class="space-y-8">
            <div class="bg-gradient-to-r from-purple-500 to-blue-600 p-8 rounded-2xl shadow-xl text-white">
                <h2 class="text-3xl font-bold mb-6">Nuestra Misión</h2>
                <p class="text-lg leading-relaxed mb-6">
                    Transformar la experiencia de compra online mediante innovación tecnológica, servicio personalizado 
                    y relaciones comerciales éticas con proveedores y clientes.
                </p>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="font-semibold">+10,000 clientes satisfechos</span>
                </div>
            </div>

            <!-- Vision Card -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Nuestra Visión</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Ser reconocidos como el e-commerce líder en Latinoamérica para 2025, destacando por nuestra 
                    innovación en logística, atención al cliente y variedad de productos exclusivos.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-gray-50 rounded-2xl p-8 md:p-12 shadow-inner mb-16">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Contáctanos</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                ¿Tienes preguntas? Nuestro equipo está listo para ayudarte.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Contact Info -->
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="bg-red-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Teléfono</h3>
                        <p class="text-gray-600">+591 69302176</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Email</h3>
                        <p class="text-gray-600">info@ecommerceb2c.com</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Dirección</h3>
                        <p class="text-gray-600">Av. Circunvalación 23, Tarija, Bolivia</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
                        <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Mensaje</label>
                        <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-yellow-500 text-white font-bold py-3 px-4 rounded-lg hover:from-red-600 hover:to-yellow-600 transition-all shadow-md hover:shadow-lg">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Back to Home -->
    <div class="text-center">
        <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-purple-500 to-blue-600 text-white font-bold rounded-full hover:from-purple-600 hover:to-blue-700 transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Volver al Inicio
        </a>
    </div>
</div>
@endsection