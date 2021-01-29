<?php

namespace App\Exports;
use App\Models\Item;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ItemExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('excel.items', [
            'items' => Item::all()
        ]);
    }
}
