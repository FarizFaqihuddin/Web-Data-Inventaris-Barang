<?php

namespace App\Exports;
use App\Models\Mutation;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('excel.mutations', [
            'mutations' => Mutation::all()
        ]);
    }
}
