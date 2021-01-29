<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id','brand_id','name','specification','condition','picture','stock','status','location'];
	
	public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
	
	public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}