<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Mostrar la página de inicio con productos destacados.
     */
    public function index()
    {
        $products = Product::where('is_active', true)->take(6)->get();  // Solo productos activos y limitados a 6
        return view('home.index', compact('products'));
    }

    /**
     * Mostrar todos los productos.
     */
    public function showProducts()
    {
        $products = Product::all();
        return view('home.mostrarproductos', compact('products'));  // Asegúrate de tener esta vista
    }
    
}
