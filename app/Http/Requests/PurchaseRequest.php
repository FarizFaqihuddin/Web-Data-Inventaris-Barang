<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'invoice_number'  => 'required|unique:purchases,invoice_number,'.request()->route('purchase').'id',
            
            'purchase_date' => 'required',
            'total_price' => 'required'
        ];
    }

}