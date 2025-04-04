<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;  // Asegúrate de que el alias PDF esté disponible

class ReportController extends Controller
{
    /**
     * Genera un reporte en PDF de los productos, aplicando los mismos filtros que en el index.
     */
    public function productsReport(Request $request)
    {
        // Emplea la misma lógica de filtrado que en el index de productos.
        $query = Product::with('category');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
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
        
        $products = $query->get();

        // Carga la vista para el reporte y genera el PDF.
        $pdf = Pdf::loadView('admin.reports.products', compact('products'));

        // Puedes devolverlo para visualizarlo en el navegador o forzar la descarga.
        return $pdf->download('reporte_productos.pdf');
    }

    public function usersReport(Request $request)
    {
        $query = User::where('role', '!=', 'admin');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status == 'active') {
                $query->where('is_active', true);
            } elseif ($request->status == 'inactive') {
                $query->where('is_active', false);
            }
        }

        $users = $query->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.reports.users', compact('users'));

        return $pdf->download('reporte_usuarios.pdf');
    }

    public function salesReport(Request $request)
    {
        $query = Sale::with(['user', 'saleDetails']);

        // Filtro por búsqueda: por ID o por el nombre del usuario
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
        
        $sales = $query->get();
        $pdf = Pdf::loadView('admin.reports.sales', compact('sales'));
        return $pdf->download('reporte_ventas.pdf');
    }
}
