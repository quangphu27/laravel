<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;  // Thêm dòng này

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;  // Thêm HasApiTokens vào đây

    protected $table = 'users';   
    protected $dates = ['email_verified_at'];
    protected $fillable = [
        'name',
        'email',
        'password',  
        'ngaysinh',
        'diachi',
        'sdt',
        'email_verified_at',
        'provider',
         'provider_id'
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
