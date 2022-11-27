<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::guest())
            return false;
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
            'inputpid' => 'required',
            'unit_cost' => 'required|numeric',
            'unit_price' => 'required|numeric|gte:unit_cost',
            'image' => 'file|mimes:jpeg,jpg,png',
            'product_name' => 'required',
            'product_category' => 'required|exists:tbl_product_categories,product_category_id',
            'description' => 'required|max:150'
        ];
    }
}
