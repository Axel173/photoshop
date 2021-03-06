<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopOrderRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\Http\Request;

class AdminController extends BaseAdminController
{

    private $shopOrderRepository;
    private $shopProductRepository;
    private $shopCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopOrderRepository = app(ShopOrderRepository::class);
        $this->shopProductRepository = app(ShopProductRepository::class);
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(__METHOD__, Auth::user());
        $countOrders = $this->shopOrderRepository->countOrders();
        $sumOrders = $this->shopOrderRepository->sumOrders();
        $countProducts = $this->shopProductRepository->countProducts();
        $countCategories = $this->shopCategoryRepository->countCategories();

        return view('shop.admin.index', compact(
            'countOrders',
            'sumOrders',
            'countProducts',
            'countCategories'
        ));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
