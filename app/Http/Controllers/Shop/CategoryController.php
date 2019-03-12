<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BaseController
{
    /**
     * @var ShopCategoryRepository;
     */
    private $shopCategoryRepository;
    private $shopProductRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
        $this->shopProductRepository = app(ShopProductRepository::class);
    }

    public function show($category_slug = '')
    {
        if ($category_slug === '') {
            $products = $this->shopProductRepository->getProductsWithPaginate(10);
        } else {
            $products = $this->shopCategoryRepository->getCategory($category_slug)->products()->paginate(10);
        }
        return view('shop.category.index', compact('products'));
    }
}
