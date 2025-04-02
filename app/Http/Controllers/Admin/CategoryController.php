<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Muestra el listado de categorías con opción de filtrado y paginación.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        // Filtrado por búsqueda (por nombre)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Filtrado por estado (activo/inactivo)
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $categories = $query->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }


    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Almacena una nueva categoría.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = true; // se crea activa por defecto

        Category::create($data);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar una categoría existente.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Actualiza la información de una categoría.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * "Elimina" (da de baja) una categoría cambiando su estado a inactiva.
     */
    public function destroy(Category $category)
    {
        $category->update(['is_active' => false]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Categoría dada de baja exitosamente.');
    }

    /**
     * Reactiva una categoría inactiva.
     */
    public function reactivate($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['is_active' => true]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Categoría reactivada exitosamente.');
    }
}
