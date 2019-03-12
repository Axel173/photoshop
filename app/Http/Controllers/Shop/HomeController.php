<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends BaseController
{
    /**
     * @var ShopProductRepository;
     */
    private $shopCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //(__METHOD__);

        $categoriesWithProducts = $this->shopCategoryRepository->getAllWithProducts();

        return view('shop.home.index', compact('categoriesWithProducts'));
    }
}
