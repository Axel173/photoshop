<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopOrderCreateRequest extends FormRequest
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
            'first_name'    => 'required|min:5|max:200',
            'last_name'     => 'required|min:5|max:200',
            'user_name'     => 'required|min:5|max:200',
            'email'         => 'required|email',
            'description'   => 'max:500',
//            'slug'        => 'max:200',
//            'parent_id'   => 'required|integer|exists:blog_categories,id'
        ];
    }
}
