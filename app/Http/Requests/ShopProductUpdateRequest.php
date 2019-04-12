<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:5|max:200',
            'slug'          => 'max:200',
            'description'   => 'required|string|max:10000|min:5',
            'price'         => 'required|integer',
            'discount'      => 'integer',
            'thumb_img'     => 'string|max:500',
            'preview_img'   => 'string|max:500',
            'original_img'  => 'string|max:500',
            'category_id'   => 'required|integer|exists:shop_categories,id'
        ];
    }
}
