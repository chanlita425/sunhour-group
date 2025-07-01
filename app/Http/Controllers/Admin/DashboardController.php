<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Models;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $brands = Brand::query()->count();
        $products = Product::query()->count();
        $models = Models::query()->count();
        return view('admin.dashboard.index', compact('brands', 'products', 'models'));
    }
}
