<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ShopOrderCreateRequest;
use App\Mail\TestMail;
use App\Repositories\ShopCartProductRepository;
use App\Repositories\ShopCartRepository;
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

    public function __construct()
    {
        parent::__construct();

        $this->shopProductRepository = app(ShopProductRepository::class);
        $this->shopCartProductRepository = app(ShopCartProductRepository::class);
        $this->shopCartRepository = app(ShopCartRepository::class);
        $this->shopUserRepository = app(ShopUserRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $this->cart_id = Cookie::get('cart');
        $cart_products = $this->shopCartRepository->getProducts($this->cart_id);
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
        $data = $request->input();
        $res = $this->shopUserRepository->findEmail($data['email']);
        if(!$res)
        {
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
