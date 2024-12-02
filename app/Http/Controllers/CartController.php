<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function add(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Bạn cần đăng nhập trước.');
        }

        // Lấy thông tin sản phẩm từ request
        $productId = $request->input('product_id');
        $quantity = 1; // Bạn có thể thay đổi logic này để nhập số lượng từ người dùng
        $user = Auth::user();

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        $cart = Cart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->first();

        if ($cart) {
            // Nếu sản phẩm đã có, tăng số lượng
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            // Nếu sản phẩm chưa có, tạo mới
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function index()
{
    $cartItems = Cart::where('user_id', Auth::id())->get();
    $total = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('cart', compact('cartItems', 'total'));
}


public function update(Request $request)
{
    $user = auth()->user();

    // Tìm giỏ hàng của người dùng
    $cart = Cart::where('user_id', $user->id)
                ->where('product_id', $request->id)
                ->first();

    if ($cart) {
        // Cập nhật số lượng
        $cart->update(['quantity' => $request->quantity]);
    }

    return redirect()->route('cart.index');
}
public function remove(Request $request)
{
    $user = auth()->user();

    // Tìm và xóa sản phẩm khỏi giỏ hàng
    Cart::where('user_id', $user->id)
        ->where('product_id', $request->id)
        ->delete();

    return redirect()->route('cart.index');
}
}