<?php

namespace App\Observers;

use App\Models\ShopProduct;
use Intervention\Image\Facades\Image;
use Str;

class ShopProductObserver
{
    /**
     * Handle the shop product "created" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function created(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the blog post "creating" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function creating(ShopProduct $shopProduct)
    {
        $this->setImages($shopProduct);

        $this->setSlug($shopProduct);
    }

    protected function setSlug(ShopProduct $shopProduct)
    {
        if (empty($shopProduct->slug)) {
            $shopProduct->slug = Str::slug($shopProduct->title);
        }
    }


    protected function setImages(ShopProduct $shopProduct)
    {
        if (request()->file('original_img')) {
            $file = request()->file('original_img');
            $extension = $file->getClientOriginalName();

            $thumb = Image::make($file->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $prev = Image::make($file->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio(); //maintain image ratio
            });
            $destinationPath = base_path('/public/images/products/' . md5($extension . time()) . '/');
            $file->move($destinationPath, $extension);
            $prev->save($destinationPath . 'prev_' . $extension);
            $thumb->save($destinationPath . 'thumb_' . $extension);

            $shopProduct->preview_img = 'images/products/'. md5($extension . time()) .'/prev_' . $extension;
            $shopProduct->thumb_img = 'images/products/'. md5($extension . time()) .'/thumb_' . $extension;
            $shopProduct->original_img = 'images/products/' . md5($extension . time()) . '/' . $extension;
        }
    }

    /**
     * Handle the shop product "updated" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function updated(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the blog post "updating" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function updating(ShopProduct $shopProduct)
    {
        $this->setImages($shopProduct);

        $this->setSlug($shopProduct);

    }

    /**
     * Handle the shop product "deleted" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function deleted(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the shop product "restored" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function restored(ShopProduct $shopProduct)
    {
    }

    /**
     * Handle the shop product "force deleted" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function forceDeleted(ShopProduct $shopProduct)
    {
        //
    }
}
