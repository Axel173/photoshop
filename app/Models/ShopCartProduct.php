<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopCartProduct extends Model
{
    use SoftDeletes;

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
}
