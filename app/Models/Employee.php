<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','email','nik','position'];

    public function mutations()
    {
        return $this->hasMany('App\Models\Mutation');
    }
}
