<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopOrder extends Model
{
    use SoftDeletes;

    protected $fillable
        = [
            'first_name',
            'last_name',
            'email',
            'description',
            'total_price',
            'user_id',
            'is_published',
            'status_id'
        ];

    public function status()
    {
        return $this->belongsTo(ShopOrderStatus::class);
    }

    public function products()
    {
        return $this->belongsToMany(ShopProduct::class, 'shop_ordered_products', 'order_id', 'product_id')
            ->withPivot('id', 'title', 'price', 'discount')->orderBy('pivot_id', 'ASC');
    }
}
