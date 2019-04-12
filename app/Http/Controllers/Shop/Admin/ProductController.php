<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopProductCreateRequest;
use App\Http\Requests\ShopProductUpdateRequest;
use App\Models\ShopProduct;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Str;

class ProductController extends BaseAdminController
{

    private $shopProductRepository;
    private $shopCategoryRepository;

    public function __construct()
    {
        parent::__construct();

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
        $paginator = $this->shopProductRepository->getAllWithPaginate(10);

        return view('shop.admin.products.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ShopProduct();
        $categoryList
            = $this->shopCategoryRepository->getForComboBox();

        return view('shop.admin.products.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopProductCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopProductCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        if($request->file('image'))
        {
            $file = $request->file('image');
            $path = 'public\images\products\\' . $data['slug'] . '\\';
            $destinationPath = base_path($path);
            $file->move($destinationPath, $file->getClientOriginalName());
            $data['thumb_img'] = $path . $file->getClientOriginalName();
            $data['preview_img'] = $path . $file->getClientOriginalName();
            $data['original_img'] = $path . $file->getClientOriginalName();
        }
        //Создаст объект но не добавит в БД
        $item = new ShopProduct($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('shop.admin.products.edit', [$item->id])
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
        $item = $this->shopProductRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList
            = $this->shopCategoryRepository->getForComboBox();

        return view('shop.admin.products.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopProductUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopProductUpdateRequest $request, $id)
    {
        $item = $this->shopProductRepository->getEdit($id);


        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        if($request->file('image'))
        {
            $file = $request->file('image');
            $path = 'public\images\products\\' . $data['slug'] . '\\';

            $destinationPath = base_path($path);

            $file->move($destinationPath, $file->getClientOriginalName());
            $data['thumb_img'] = $path . $file->getClientOriginalName();
            $data['preview_img'] = $path . $file->getClientOriginalName();
            $data['original_img'] = $path . $file->getClientOriginalName();
        }
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.products.edit', $item->id)
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
