<?php

namespace App\Http\Controllers\Export;

use App\Deuda;
use Illuminate\Http\Request;
use App\Exports\DeudasExport;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DeudaExportController extends Controller
{
    public function pdf($id)
    {
        $deudas = Deuda::with('puesto')->where('puesto_id', $id)->get();

        $deudaSisa = $deudas->sum('monto_sisa');
        $deudaAgua = $deudas->sum('monto_agua');

        $pdf = PDF::loadView('exports.exportPDF.deudas-pdf', compact('deudas', 'deudaSisa', 'deudaAgua'));

        // return $pdf->stream();
        return $pdf->download('deudas-pdf.pdf');
    }

    // php artisan make:export DeudasExport --model=User
    public function excel($id)
    {
        return Excel::download(new DeudasExport($id), 'deudas-excel.xlsx');
    }
}
