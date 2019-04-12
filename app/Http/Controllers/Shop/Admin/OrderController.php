<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopOrderUpdateRequest;
use App\Repositories\ShopOrderRepository;
use App\Repositories\ShopOrderStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends BaseAdminController
{

    private $shopOrderRepository;
    private $shopOrderStatusRepository;

    public function __construct()
    {
        parent::__construct();

        $this->shopOrderRepository = app(ShopOrderRepository::class);
        $this->shopOrderStatusRepository = app(ShopOrderStatusRepository::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->shopOrderRepository
            ->getAllWithPaginate(15);

        return view('shop.admin.orders.index', compact('paginator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->shopOrderRepository
            ->getOrder($id);
        $statusList = $this->shopOrderStatusRepository
            ->getForComboBox();
        return view('shop.admin.orders.edit', compact('order', 'statusList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopOrderUpdateRequest $request, $id)
    {
        $item = $this->shopOrderRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.orders.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->shopOrderRepository->deleteOrder($id);
        if ($result) {
            return redirect()
                ->route('shop.admin.orders.index')
                ->with(['success' => 'Успешно удалено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
