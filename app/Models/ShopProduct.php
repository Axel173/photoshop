<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class ShopProduct extends Model
{
    use SoftDeletes;
    use Searchable;

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }
}
