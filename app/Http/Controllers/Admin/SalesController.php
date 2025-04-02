<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class SalesController extends Controller
{
    /**
     * Muestra el listado de ventas con filtros y paginación.
     */
    public function index(Request $request)
    {
        // Cargamos el usuario y los detalles (para calcular el total)
        $query = Sale::with(['user', 'saleDetails']);

        // Filtro por búsqueda: por ID de venta o por el nombre del usuario asociado
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filtro por estado (activo/inactivo)
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $sales = $query->paginate(10);

        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Muestra el detalle de una venta.
     */
    public function show($id)
    {
        // Se cargan las relaciones necesarias: el usuario y los detalles (que a su vez tienen el producto)
        $sale = Sale::with(['user', 'saleDetails.product'])->findOrFail($id);
        return view('admin.sales.show', compact('sale'));
    }

    /**
     * "Elimina" (desactiva) una venta.
     */
    public function destroy(Sale $sale)
    {
        // En lugar de eliminar, se desactiva la venta
        $sale->update(['is_active' => false]);

        return redirect()->route('admin.sales.index')
                         ->with('success', 'Venta desactivada exitosamente.');
    }

    /**
     * Reactiva una venta desactivada.
     */
    public function reactivate($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update(['is_active' => true]);

        return redirect()->route('admin.sales.index')
                         ->with('success', 'Venta reactivada exitosamente.');
    }
}
