<?php

namespace App\Http\Controllers\Auth;
use App\Mail\SendPasswordMail;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class ResetPasswordController extends Controller
{
    public function sendNewPassword($email)
    {
        // Kiểm tra email có tồn tại trong hệ thống không
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'Email không tồn tại'], 404);
        }
    
        // Sinh một mật khẩu mới hoặc tạo liên kết reset mật khẩu
        $newPassword = Str::random(8); // tạo mật khẩu ngẫu nhiên
    
        // Cập nhật mật khẩu trong cơ sở dữ liệu
        $user->password = bcrypt($newPassword);
        $user->save();
    
        // Gửi email thông báo mật khẩu mới
        Mail::to($email)->send(new ResetPasswordMail($newPassword));
    
        return response()->json(['message' => 'Mật khẩu mới đã được gửi vào email của bạn']);
    }
    public function submit(Request $request)
{

    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);
    $user = User::where('email', $request->email)->first();
    
    if ($user) {
        $newPassword = Str::random(8);
        Mail::send('emails.reset_password', ['password' => $newPassword], function ($message) use ($user) {
            $message->to($user->email)->subject('Your New Password');
        });
        $user->password = bcrypt($newPassword);
        $user->save();

        return view('login-register');
    } else {
        return redirect()->back()->withErrors(['email' => 'Email không tồn tại.']);
    }
}

}