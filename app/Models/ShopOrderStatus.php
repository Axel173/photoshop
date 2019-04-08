<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrderStatus extends Model
{
    public function orders()
    {
        return $this->hasMany(ShopOrder::class, 'status_id');
    }
}
