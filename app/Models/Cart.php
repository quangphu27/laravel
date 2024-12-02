<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function totalPrice()
    {
        // Đảm bảo sản phẩm tồn tại và có giá trị
        if ($this->product && $this->product->price) {
            return $this->product->price * $this->quantity;
        }

        return 0;
    }
}
