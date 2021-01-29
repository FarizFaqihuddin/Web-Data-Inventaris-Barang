<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
	
	public function items(){
    	return $this->hasMany('App\Models\Item', 'category_id');
    }
}