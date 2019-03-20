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
        $this->cart_id = Cookie::get('cart');
        $cart_products = $this->shopCartRepository->getProducts($this->cart_id);

        return view('shop.cart.index', compact('cart_products'));
    }

    public function add($product_slug)
    {
        $this->cart_id = Cookie::get('cart');

        $product = $this->shopProductRepository
            ->getProduct($product_slug);

        //если в куках нет cart, то в бд создаем новую корзину
        if (!$this->cart_id) {

            $cart = $this->shopCartRepository
                ->createNewCart();
            $this->cart_id = $cart->id;
            $cookie = cookie('cart', $this->cart_id);

            $this->shopCartProductRepository
                ->addToCart($this->cart_id, $product);

            return back()->withCookie($cookie)
                ->with(['success' => 'Добавлено в корзину']);
            //иначе нужно проверить, есть ли такая корзина
        } else {
            $cart_id = $this->shopCartRepository->getCart($this->cart_id);
            //если корзины нет с таким id нет, создаем новую
            if($cart_id != $this->cart_id)
            {
                $this->cart_id = $cart_id;
            }

            $cart_product = $this->shopCartRepository
                ->getCartProducts($this->cart_id);
            //проверяем есть ли товар уже в корзине
            if ($this->searchProductInCart($cart_product, $product->id)) {
                return back()->withErrors(['msg' => 'Товар уже находится в корзине']);
            }

            $cookie = cookie('cart', $this->cart_id);
            $this->shopCartProductRepository
                ->addToCart($this->cart_id, $product);
        }

        return back()->with(['success' => 'Добавлено в корзину'])->withCookie($cookie);
    }

    public function searchProductInCart($cart_product, $product_id)
    {
        if (!empty($cart_product) and $product_id) {
            if ($cart_product->contains('product_id', $product_id)) {
                return $product_id;
            }
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = $this->checkCartExist();
        if(!$cart == false)
        {
            $res = $this->shopCartProductRepository->deleteFromCart($id, $this->cart_id);
            if($res)
            {
                return back()->with(['success' => 'Товар удален']);
            }
        }
        return back()->withErrors(['msg' => 'Ошибка при удалении, товар в корзине не найден']);
    }

    public function change()
    {
    }

    public function checkCartExist()
    {
        $this->cart_id = Cookie::get('cart');
        if($this->cart_id)
        {
            $result = $this->shopCartRepository->findCart($this->cart_id);
            return $result;
        }

        return false;
    }
}
