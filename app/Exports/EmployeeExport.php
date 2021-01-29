<?php

namespace App\Exports;
use App\Models\Employee;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class EmployeeExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('excel.employees', [
            'employees' => Employee::all()
        ]);
    }
}
