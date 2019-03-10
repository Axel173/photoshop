<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopCategory extends Model
{
    use SoftDeletes;

    public function products()
    {
        return $this->hasMany(ShopProduct::class, 'category_id');
    }
}
