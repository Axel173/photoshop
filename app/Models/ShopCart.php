<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopCart extends Model
{
    use SoftDeletes;

    protected $fillable
        = [
            'is_published',
        ];

    public function cartProducts()
    {
        return $this->hasMany(ShopCartProduct::class, 'cart_id');
    }
}
