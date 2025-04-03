<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Estadísticas básicas
        $userCount     = User::where('role', '!=', 'admin')->count();
        $salesCount    = Sale::count();
        $productCount  = Product::count();
        $categoryCount = Category::count();

        // Últimas 5 ventas
        $latestSales   = Sale::with('user')
                            ->orderBy('sale_date', 'desc')
                            ->limit(5)
                            ->get();

        // Productos más vendidos: se asume que Product tiene la relación saleDetails
        // Utilizamos withSum para sumar la cantidad vendida
        $topProducts   = Product::with('category')
                            ->withSum('saleDetails', 'quantity')
                            ->orderByDesc('sale_details_sum_quantity')
                            ->limit(5)
                            ->get();

        // Usuarios con más compras: se asume que User tiene la relación sales
        $topUsers      = User::where('role', '!=', 'admin')
                            ->withCount('sales')
                            ->orderByDesc('sales_count')
                            ->limit(5)
                            ->get();

        return view('admin.dashboard', compact(
            'userCount',
            'salesCount',
            'productCount',
            'categoryCount',
            'latestSales',
            'topProducts',
            'topUsers'
        ));
    }
}
