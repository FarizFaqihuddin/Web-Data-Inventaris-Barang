<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Models\ProductCategory;
use App\Models\Unit;


class Product extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_category' => $this->product_category,
            'unit' => $this->unit,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
        ];
    }
}
