<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends BaseController
{
    /**
     * @var ShopProductRepository;
     */
    private $shopProductRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopProductRepository = app(ShopProductRepository::class);
    }

    public function show($product_slug)
    {
        $product = $this
            ->shopProductRepository
            ->getProduct($product_slug);
        $products = $this
            ->shopProductRepository
            ->getRandomProducts($product_slug);

        if (empty($product)) {
            abort(404);
        }

        return view('shop.product.index', compact('product', 'products'));
    }
}
