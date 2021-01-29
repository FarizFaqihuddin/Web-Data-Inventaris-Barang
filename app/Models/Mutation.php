<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    protected $fillable = ['item_id','employee_id','amount_item','mutation_status','information'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item','item_id');
    }

    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase','purchase_id');
    }
}
