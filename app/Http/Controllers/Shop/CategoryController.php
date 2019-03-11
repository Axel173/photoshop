<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BaseController
{
    public function show($category_slug)
    {
        //dd(__METHOD__, $category_slug);
        return view('shop.category.index');
    }
}
