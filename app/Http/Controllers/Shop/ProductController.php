<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends BaseController
{
    public function show($category_slug, $product_slug)
    {
        dd(__METHOD__, $category_slug, $product_slug);
    }
}
