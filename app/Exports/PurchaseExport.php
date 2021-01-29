<?php

namespace App\Exports;
use App\Models\Purchase;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PurchaseExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('excel.purchases', [
            'purchases' => Purchase::all()
        ]);
    }
}
