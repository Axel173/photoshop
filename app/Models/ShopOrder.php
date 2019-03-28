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
            'is_published'
        ];
}
