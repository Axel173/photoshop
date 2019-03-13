<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class ShopCategory extends Model
{
    use SoftDeletes;
    use Searchable;

    public function products()
    {
        return $this->hasMany(ShopProduct::class, 'category_id');
    }
}
