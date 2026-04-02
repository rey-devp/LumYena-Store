<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $activeProductsCount = Product::where('is_active', true)->count();
        
        return view('admin.dashboard', compact('productsCount', 'categoriesCount', 'activeProductsCount'));
    }
}
