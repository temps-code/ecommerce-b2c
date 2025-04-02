<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Retorna la vista del dashboard (por ejemplo, resources/views/admin/dashboard.blade.php)
        return view('admin.dashboard');
    }
}
