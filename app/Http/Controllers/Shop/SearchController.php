<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ShopProductRepository;

class SearchController extends BaseController
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

    public function search(Request $request)
    {
        $products = null;
        $query = '';
        // Удостоверимся, что поисковая строка есть
        if ($request->has('query')) {

            $query = $request->get('query');

            if ($query) {
                // Используем синтаксис Laravel Scout для поиска по таблице products.
                $products = $this->shopProductRepository
                    ->getSearchProductsWithPaginate($query, 5);
            }
        }

        /*dd($products);*/

        return view('shop.search.index', compact('products', 'query'));
    }
}
