<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopOrderRepository;
use Auth;

class PersonalController extends BaseController
{
    private $shopOrderRepository;

    public function __construct()
    {
        parent::__construct();
        $this->shopOrderRepository = app(ShopOrderRepository::class);

    }

    public function index()
    {
        $user_id = Auth::user()->id;

        $last_order = $this->shopOrderRepository
            ->getLastUserOrder($user_id);
        return view('shop.personal.index', compact('last_order'));
    }
}
