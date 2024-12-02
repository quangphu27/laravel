<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả danh mục và sản phẩm
        $categories = Category::all();
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->get();

        // Truyền dữ liệu qua view
        return view('home', compact('categories', 'products'));
    }
}
