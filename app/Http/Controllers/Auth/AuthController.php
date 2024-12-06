<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\AuthService;
use App\Models\EmailVerification;
use App\Mail\EmailVerification as VerificationMail;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
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

    $user=User::create([
        'name' => $request->name, 
        'email' => $request->email,
        'password' => Hash::make($request->password), // Mã hóa password
        'ngaysinh' => '2002/02/27',
        'diachi' => $request->diachi,
        'sdt' => $request->sdt,
    ]);

    // Tạo mã token xác thực
    $token = Str::random(60);

    // Lưu token vào bảng email_verifications
    EmailVerification::create([
        'user_id' => $user->id,
        'token' => $token,
    ]);

    Mail::to($user->email)->send(new VerificationMail($token, $user));
    return view('emails.wait_verifycation_email');
}

public function login(Request $request)
{
    // Kiểm tra tính hợp lệ của dữ liệu đầu vào
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);
    $user = User::where('email', $request->email)->first();
    if ($user && $user->email_verified_at) {
        if (Auth::attempt($request->only('email', 'password'))) {
            if ($user->email == 'phu2722002@gmail.com') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home');
        }
    }
    return redirect()->back()->withErrors([
        'error' => 'Email hoặc mật khẩu không chính xác, hoặc email chưa được xác thực.',
    ]);
}

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.form');
    }
}  