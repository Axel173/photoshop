<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopCategoryCreateRequest;
use App\Http\Requests\ShopCategoryUpdateRequest;
use App\Models\ShopCategory;
use App\Repositories\ShopCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Str;

class CategoryController extends BaseAdminController
{

    private $shopCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->shopCategoryRepository->getAllWithPaginate(5);

        return view('shop.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ShopCategory();
        $categoryList
            = $this->shopCategoryRepository->getForComboBox();

        return view('shop.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }

        //Создаст объект но не добавит в БД
        $item = new ShopCategory($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('shop.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->shopCategoryRepository->getEdit($id);
        if(empty($item)) {
            abort(404);
        }
        $categoryList
            = $this->shopCategoryRepository->getForComboBox();

        return view('shop.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopCategoryUpdateRequest $request, $id)
    {
        $item = $this->shopCategoryRepository->getEdit($id);


        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.categories.edit', $item->id)
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
        //
    }
}
