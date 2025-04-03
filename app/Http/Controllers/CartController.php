<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Mostrar carrito
    public function index()
    {
        return view('cart.index');
    }

    // Agregar producto al carrito
    public function add(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'El producto no existe.');
        }

        // Obtener el carrito asegurando que sea un array
        $cart = session()->get('cart', []);
        if (!is_array($cart)) {
            $cart = [];
        }

        // Si el producto ya está en el carrito, aumentamos la cantidad
        if (isset($cart[$productId]) && is_array($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            // Agregar el producto con su información, usando "image_path"
            $cart[$productId] = [
                'name'        => $product->name,
                'price'       => $product->price,
                'quantity'    => 1,
                'image_path'  => $product->image_path, // Aquí se usa la clave correcta
            ];
        }

        // Guardamos el carrito
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito.');
    }

    public function checkout()
    {
        if (!session()->has('cart') || empty(session('cart'))) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }
    
        // Aquí puedes manejar el proceso de compra, por ejemplo, guardarlo en la base de datos.
        
        session()->forget('cart'); // Vaciar el carrito después de la compra
        return redirect()->route('home')->with('success', 'Compra realizada con éxito.');
    }
        
    

    // Actualizar cantidad del carrito
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('message', 'Carrito actualizado');
    }

    // Eliminar producto del carrito
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('message', 'Producto eliminado del carrito');
    }

    // Vaciar carrito
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('message', 'Carrito vaciado');
    }
}