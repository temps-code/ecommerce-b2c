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
        $userCount     = User::where('role', '!=', 'admin')->count();
        $salesCount    = Sale::count();
        $productCount  = Product::count();
        $categoryCount = Category::count();
        $latestSales   = Sale::with('user')
                            ->orderBy('sale_date', 'desc')
                            ->limit(5)
                            ->get();

        return view('admin.dashboard', compact('userCount', 'salesCount', 'productCount', 'categoryCount', 'latestSales'));
    }
}
