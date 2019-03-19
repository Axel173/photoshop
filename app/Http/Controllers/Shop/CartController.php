<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopCartProductRepository;
use App\Repositories\ShopCartRepository;
use App\Repositories\ShopProductRepository;
use Cookie;

class CartController extends BaseController
{

    /**
     * @var ShopProductRepository;
     */
    private $shopProductRepository;
    private $shopCartProductRepository;
    private $shopCartRepository;
    private $cart_id;

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

    }

    public function add($product_slug)
    {
        $this->cart_id = Cookie::get('cart');
        $product = $this->shopProductRepository
            ->getProduct($product_slug);

        if (!$this->cart_id) {
            $cart = $this->shopCartRepository
                ->create();
            $this->cart_id = $cart->id;
            $cookie = cookie('cart', $this->cart_id);

            $this->shopCartProductRepository
                ->addToCart($this->cart_id, $product);

            return back()->withCookie($cookie)
                ->with(['success' => 'Добавлено в корзину']);
        } else {
            $cart_product = $this->shopCartRepository
                ->getCartProduct($this->cart_id);
            if ($this->searchProductInCart($cart_product, $product->id)) {
                return back()->withErrors(['msg' => 'Товар уже находится в корзине']);
            }
            $this->shopCartProductRepository
                ->addToCart($this->cart_id, $product);
        }

        return back()->with(['success' => 'Добавлено в корзину']);
    }

    public function searchProductInCart($cart_product, $product_id)
    {
        if(!empty($cart_product) and $product_id)
        {
            foreach ($cart_product as $key => $product)
            {
                if($product->product_id == $product_id)
                {
                    return $product_id;
                }
            }
        }
        return false;
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
