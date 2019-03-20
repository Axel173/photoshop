<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopCartProduct extends Model
{

    protected $fillable
        = [
            'product_id',
            'cart_id',
            'quantity',
            'is_published',
        ];

    public function cart()
    {
        return $this->belongsTo(ShopCart::class);
    }

    public function product()
    {
        return $this->belongsTo(ShopProduct::class);
    }
}
