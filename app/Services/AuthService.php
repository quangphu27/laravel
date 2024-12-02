<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($params)
    {
        // $params['password'] = Hash::make($params['password']);

        return $this->user->create($params);
    }

    public function login($params)
{
    // Tìm người dùng theo email
    $user = $this->user->where('email', $params['email'])->first();

    // Kiểm tra nếu không có người dùng hoặc mật khẩu sai
    if (!$user || !Hash::check($params['password'], $user->password)) {
        return [
            'message' => 'Email or password is incorrect',
            'code' => 401,
        ];
    }

    // Tạo access token cho người dùng và trả về
    $accessToken = $user->createToken('YourAppName')->plainTextToken;

    return [
        'message' => 'Login success',
        'code' => 200,
        'access_token' => $accessToken, // Trả về token mới
    ];
}


}
