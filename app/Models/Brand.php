<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];
	
	public function items(){
    	return $this->hasMany('App\Models\Item', 'brand_id');
    }
}