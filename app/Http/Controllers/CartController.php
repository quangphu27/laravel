<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Bạn cần đăng nhập trước.');
        }

        $productId = $request->input('product_id');
        $quantity = 1;
        $user = Auth::user();

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

        // Nếu sản phẩm đã có trong giỏ hàng thì tăng số lượng
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có, thêm mới vào giỏ hàng
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
            return $item->product ? $item->product->price * $item->quantity : 0;
        });

        return view('cart', compact('cartItems', 'total'));
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('id', $id)->first();  // Đảm bảo tìm đúng sản phẩm trong giỏ hàng

        if ($cartItem) {
            // Cập nhật số lượng sản phẩm
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();
        }

        return redirect()->route('cart.index');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->route('cart.index');
    }
}
