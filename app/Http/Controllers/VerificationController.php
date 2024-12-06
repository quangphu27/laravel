<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyEmail($token)
    {
        // Kiểm tra xem token có hợp lệ không
        $verification = EmailVerification::where('token', $token)->first();

        if (!$verification || $verification->verified_at) {
            return redirect('/')->with('error', 'Token xác thực không hợp lệ hoặc đã được sử dụng.');
        }

        $user = User::find($verification->user_id);
        $user->email_verified_at = now();
        $user->save();
        $verification->verified_at = now();
        $verification->save();
        return redirect('/')->with('success', 'Tài khoản của bạn đã được xác thực thành công!');
    }
}
