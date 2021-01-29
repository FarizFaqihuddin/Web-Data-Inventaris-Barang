<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class MutationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'employee_id' => 'required',
            'item_id' => 'required',
            'amount_item' => 'required|min:1',
            'mutation_status' => 'required',
        ];
    }

}