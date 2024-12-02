<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = $this->productService->getList(10); // Lấy 10 sản phẩm mỗi trang
        return view('products.index', compact('products'));
    }

    // Trang thêm mới sản phẩm
    public function create()
    {
        $categories = $this->categoryService->getList();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'stock' => 'required|numeric',
        'status' => 'nullable|in:0,1',
        'category_id' => 'required|exists:categories,id', // Xác thực category_id
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Kiểm tra nếu có ảnh được tải lên
    if ($request->hasFile('image')) {
        // Lưu ảnh vào thư mục 'public/images/products' và lấy tên ảnh
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('public/images/products', $imageName);

        // Lưu đường dẫn ảnh vào cơ sở dữ liệu
        $validated['image'] = 'images/products/' . $imageName;
    }

    // Tạo sản phẩm mới với dữ liệu đã xác thực
    Product::create($validated);

    // Thông báo thành công
    return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công.');
}

    
    public function edit(Product $product)
    {
        $categories = $this->categoryService->getList();
        return view('products.edit', compact('product', 'categories'));
    }


    // Cập nhật sản phẩm
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'nullable|in:0,1',
            'stock' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Xử lý upload ảnh nếu có
        $imagePath = $product->image; // Giữ nguyên ảnh cũ nếu không tải ảnh mới lên
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);

            }
            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Cập nhật sản phẩm
        $productData = $validated;
        $productData['image'] = $imagePath;

        $result = $this->productService->update($product, $productData);

        if ($result) {
            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật.');
        } else {
            return back()->with('error', 'Có lỗi khi cập nhật sản phẩm.');
        }
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa ảnh nếu có
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}