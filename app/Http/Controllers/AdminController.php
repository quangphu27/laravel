<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Lấy tất cả các danh mục
        $products = Product::all(); // Lấy tất cả các sản phẩm
        
        return view('admin.dashboard', compact('categories', 'products')); 
    }
}
