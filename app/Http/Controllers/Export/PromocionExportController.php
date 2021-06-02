<?php

namespace App\Http\Controllers\Export;

use App\Exports\PromocionesExport;
use App\Http\Controllers\Controller;
use App\Promocion;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PromocionExportController extends Controller
{
    public function pdf()
    {
        $promociones = Promocion::all();

        $pdf = PDF::loadView('exports.exportPDF.promociones-pdf', compact('promociones'));

        // return $pdf->stream();
        return $pdf->download('promociones-pdf.pdf');
    }

    // php artisan make:export UsersExport --model=User
    public function excel()
    {
        return Excel::download(new PromocionesExport, 'promociones-excel.xlsx');
    }
}
