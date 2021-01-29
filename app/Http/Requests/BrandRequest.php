<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:brands,name,'.request()->route('brand').',id',
        ];
    }

}
