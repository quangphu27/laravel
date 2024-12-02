<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    // Khởi tạo AuthService
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Kiểm tra password và password_confirmation
            'diachi' => 'required|string|max:255',
            'sdt' => 'required|string|max:15',
        ]);

        User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa password
            'ngaysinh' => '2002/02/27',
            'diachi' => $request->diachi,
            'sdt' => $request->sdt,
        ]);
        return view('index')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập!');
    }

    public function login(Request $request)
    {
        // Kiểm tra tính hợp lệ của dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Sử dụng Auth để kiểm tra thông tin đăng nhập
        if (Auth::attempt($request->only('email', 'password'))) {
            // Đăng nhập thành công, chuyển hướng đến route 'home'
            return redirect()->route('home');
        }
    
        // Đăng nhập thất bại, quay lại trang đăng nhập với thông báo lỗi
        return redirect()->back()->withErrors([
            'error' => 'Email hoặc mật khẩu không chính xác.',
        ]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.form');
    }
}  