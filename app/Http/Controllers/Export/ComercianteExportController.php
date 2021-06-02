<?php

namespace App\Http\Controllers\Export;

use App\Puesto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\ComerciantesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ComercianteExportController extends Controller
{
    public function pdf()
    {
        $conductores = Puesto::with('user')->get();

        $pdf = PDF::loadView('exports.exportPDF.conductores-pdf', compact('conductores'));

        // return $pdf->stream();
        return $pdf->download('conductores-pdf.pdf');
    }

    // php artisan make:export UsersExport --model=User
    public function excel()
    {
        return Excel::download(new ComerciantesExport, 'comerciantes-excel.xlsx');
    }
}
