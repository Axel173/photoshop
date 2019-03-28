<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ShopOrderCreateRequest;
use App\Mail\OrderMail;
use App\Repositories\ShopCartProductRepository;
use App\Repositories\ShopCartRepository;
use App\Repositories\ShopOrderedProductRepository;
use App\Repositories\ShopOrderRepository;
use App\Repositories\ShopProductRepository;
use App\Repositories\ShopUserRepository;
use App\User;
use Auth;
use Cookie;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;

class OrderController extends BaseController
{

    private $shopProductRepository;
    private $shopCartProductRepository;
    private $shopCartRepository;
    private $cart_id;
    private $shopUserRepository;
    private $shopOrderRepository;
    private $shopOrderedProductRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopProductRepository = app(ShopProductRepository::class);
        $this->shopCartProductRepository = app(ShopCartProductRepository::class);
        $this->shopCartRepository = app(ShopCartRepository::class);
        $this->shopUserRepository = app(ShopUserRepository::class);
        $this->shopOrderRepository = app(ShopOrderRepository::class);
        $this->shopOrderedProductRepository = app(ShopOrderedProductRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //redirect(route('shop.order.create'));
        /*Mail::to('alex310197@live.com')
            ->send(new TestMail());*/
        dump(Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart_products = $this->checkCartProducts();
        if (!$cart_products->count()) {
            return redirect()
                ->route('shop.cart')
                ->withErrors(['msg' => 'Нет товаров для заказа']);
        }
        return view('shop.order.create', compact('cart_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopOrderCreateRequest $request)
    {
        $cart_products = $this->checkCartProducts();

        if (!$cart_products->count()) {
            return redirect()
                ->route('shop.cart')
                ->withErrors(['msg' => 'Нет товаров для заказа']);
        }
        $total_price = (int)$this->totalPrice($cart_products);

        $data = $request->input();
        $user = $this->shopUserRepository->findEmail($data['email']);
        if (!$user) {
            $password = Str::random(8);
            $user = User::create([
                'name' => $data['first_name'],
                'email' => $data['email'],
                'password' => Hash::make($password),
            ]);
            $user->save();
            //Mail::to($user)->send(new UserRegistered($user));
            Auth::login($user, true);
        }
        $order = $this->shopOrderRepository->createNewOrder([
            'total_price' => $total_price,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'description' => $data['description'],
            'user_id' => $user->id,
        ]);

        $order_products = $this->shopOrderedProductRepository->addProductsInOrder($order->id, $cart_products);

        $this->shopCartProductRepository->deleteAllFromCart($this->cart_id);

        Mail::to($user)
            ->send(new OrderMail($order, $order_products));

        if ($order and $order_products) {
            return redirect()
                ->route('shop.cart')
                ->with(['success' => 'Заказ сформирован. Дополнительную информацию Вы получите по email']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function checkCartProducts()
    {
        $this->cart_id = Cookie::get('cart');
        $result = $this->shopCartRepository->getProducts($this->cart_id);
        return $result;
    }

    public function totalPrice($cart_products)
    {
        $total_price = 0;
        if (!empty($cart_products)) {
            foreach ($cart_products as $product) {
                if ($product->discount > 0) {
                    $total_price += $product->price * ((100 - $product->discount) / 100);
                } else {
                    $total_price += $product->price;
                }
            }

            return $total_price;
        }

        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
