<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->get();

        return view('home', compact('categories', 'products'));
    }
    public function vanglai()
    {
        $categories = Category::all();
        $products = Product::where('status', 1)->orderBy('created_at', 'DESC')->get();

        return view('index', compact('categories', 'products'));
    }
    
}
