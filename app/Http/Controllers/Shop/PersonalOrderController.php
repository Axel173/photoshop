<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopOrderRepository;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalOrderController extends BaseController
{

    private $shopOrderRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopOrderRepository = app(ShopOrderRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $orders = $this->shopOrderRepository
            ->getAllWithUserPaginate($user_id, 10);

        return view('shop.personal.orders.index', compact('orders'));
    }


    /**
     * @param $id
     */
    public function cancel($id)
    {
        $user_id = Auth::user()->id;

        $order = $this->shopOrderRepository->cancelUserOrder($id, $user_id);
        if(!$order)
        {
            return back()->withErrors(['msg' => 'Произобла ошибка при изменении заказа']);
        }

        return back()->with(['success' => 'Заказ отменен']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $order = $this->shopOrderRepository
            ->getUserOrder($id, $user_id);
        if(!$order)
        {
            abort(404);
        }
        return view('shop.personal.orders.show',
            compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
