<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PurchaseItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'purchase_id' => 'required',
            'item_id' => 'required',
            'amount_purchased' => 'required',
            'price' => 'required',
        ];
    }

}