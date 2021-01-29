<?php

namespace App\Exports;
use App\Models\Mutation;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class MutationExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('excel.reports', [
            'mutations' => Mutation::all()
        ]);
    }
}
