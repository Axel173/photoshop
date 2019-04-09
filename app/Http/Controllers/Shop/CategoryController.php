<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\Http\Request;

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

    public function show(Request $request, $category_slug = '')
    {
        if ($category_slug === '') {
            $products = $this->shopProductRepository->getProductsWithPaginate(10);
        } else {
            $products = $this->shopCategoryRepository->getCategoryWithProductsPaginate($category_slug, 10);
        }

        if ($request->ajax()) {
            return response()->view('shop.category.ajax', compact('products'), 200);
        }
        return view('shop.category.index', compact('products'));
    }
}
