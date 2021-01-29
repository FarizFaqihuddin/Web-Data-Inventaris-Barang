<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['invoice_number','purchase_date','total_price','receipt'];

    public function purchaseItems()
    {
        return $this->hasMany('App\Models\PurchaseItem');
    }

    public function mutations()
    {
        return $this->hasMany('App\Models\Mutation');
    }
}
