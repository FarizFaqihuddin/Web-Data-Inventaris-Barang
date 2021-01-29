<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\PurchaseItem;
use App\Models\Purchase;
use App\Models\Mutation;
use App\Models\Employee;

class ApiController extends Controller
{
    public function getItem($id){
        $item = Item::with(['category', 'brand'])->findOrFail($id);
        return response()->json($item);
    }
}
