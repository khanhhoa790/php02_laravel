<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=> 'required|max:191',
            'description' => 'required|max:191',
            'product_category_id'=> 'required'|'number',
            'price'=> 'required'|'number',
            'stock'=> 'required'|'number',
            'stock_defective' => 'required'|'number',
        ];
    }
}
