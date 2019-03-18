<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopCartProductRepository;
use App\Repositories\ShopCartRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CartController extends BaseController
{

    /**
     * @var ShopProductRepository;
     */
    private $shopProductRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopProductRepository = app(ShopProductRepository::class);
        $this->shopCartProductRepository = app(ShopCartProductRepository::class);
        $this->shopCartRepository = app(ShopCartRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function add($product_slug)
    {

        $product = $this->shopProductRepository
            ->getProduct($product_slug);

        //dump(Cookie::get('name'));
        //Создаем экземпляр ответа
        /*Cookie::queue(Cookie::make('name', 'value', 60));

        Cookie::queue('name', 'value', 60);
        return dump(Cookie::get('name'));*/
        //dd(__METHOD__);
        //$products = json_decode(Cookie::get('cart'), true);
        //dd($products);
        /*$product = $this->shopProductRepository
            ->getProduct($product_slug);
        $cart = [
            $product->id => [
                'quantity' => 1
            ]
        ];*/
        //Cookie::forever('cart', json_encode($cart));
        /*if($products)
        {
            if()
        }*/
        //Cookie::forever('cart', $cart);
        //dd(__METHOD__);
    }

    public function remove()
    {
    }

    public function delete()
    {
    }

    public function change()
    {
    }

    public function check()
    {
    }
}
