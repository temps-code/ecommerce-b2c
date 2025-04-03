<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }
        
        $products = $query->paginate(10);
        $categories = Category::all();
        
        return view('admin.products.index', compact('products', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Toma los datos del request excepto la imagen
        $data = $request->except('image');

        // Si se envía una imagen...
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Define la ruta de destino en public/storage/products
            $destinationPath = public_path('storage/products');

            // Genera un nombre único para el archivo
            $filename = time() . '_' . $file->getClientOriginalName();

            // Mueve el archivo al destino
            $file->move($destinationPath, $filename);

            // Guarda la ruta relativa en la base de datos (por ejemplo: "products/filename.jpg")
            $data['image_path'] = 'products/' . $filename;
        }

        \App\Models\Product::create($data);

        return redirect()->route('admin.products.index')
                        ->with('success', 'Producto creado exitosamente.');
    }

    
    
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ]);

        $data = $request->all();

        // Procesa la carga de la imagen si se envía una nueva
        if ($request->hasFile('image')) {
            // Almacena la nueva imagen y actualiza la ruta
            $path = $request->file('image')->store('products', 'public');
            $data['image_path'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * "Eliminar" un producto: en lugar de borrarlo, se desactiva.
     */
    public function destroy(Product $product)
    {
        // En lugar de eliminar el producto, se desactiva (is_active pasa a false)
        $product->update(['is_active' => false]);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Producto desactivado exitosamente.');
    }

    /**
     * Reactivar un producto desactivado.
     */
    public function reactivate($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_active' => true]);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Producto reactivado exitosamente.');
    }
}
