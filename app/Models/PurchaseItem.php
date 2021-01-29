<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = ['item_id','purchase_id','amount_purchased','price'];

    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase','purchase_id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item','item_id');
    }
}    
