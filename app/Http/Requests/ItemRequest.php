<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
			'category_id' => 'required',
            'brand_id'    => 'required',
            'name'        => 'required:items,name,'.request()->route('item').',id',
            'stock'       => 'required|min:0',
        ];
    }

}
