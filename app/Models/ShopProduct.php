<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class ShopProduct extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $fillable
        = [
            'category_id',
            'slug',
            'title',
            'price',
            'discount',
            'thumb_img',
            'preview_img',
            'original_img',
            'description',
            'is_published',
        ];

    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }
}
