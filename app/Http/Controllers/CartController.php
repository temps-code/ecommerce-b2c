<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Aquí puedes retornar la vista del carrito o los productos agregados
        return view('cart.index');
    }

    public function add($productId)
    {
        // Lógica para agregar productos al carrito
        // Asumimos que usas una sesión o base de datos para manejar el carrito
        // Aquí solo es un ejemplo
        session()->push('cart', $productId);

        return redirect()->route('cart.index');
    }

    public function update($productId)
    {
        // Lógica para actualizar el carrito
        return redirect()->route('cart.index');
    }

    public function remove($productId)
    {
        // Lógica para eliminar un producto del carrito
        $cart = session()->get('cart', []);
        if (($key = array_search($productId, $cart)) !== false) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
