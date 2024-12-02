<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;  // Thêm dòng này

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;  // Thêm HasApiTokens vào đây

    protected $table = 'users';   

    protected $fillable = [
        'name',
        'email',
        'password',  
        'ngaysinh',
        'diachi',
        'sdt',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
