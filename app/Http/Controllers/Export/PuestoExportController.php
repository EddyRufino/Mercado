<?php

namespace App\Http\Controllers\Export;

use App\Puesto;
use Illuminate\Http\Request;
use App\Exports\PuestosExport;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\PuestosExportExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PuestoExportController extends Controller
{
    public function pdf()
    {
        $puestos = Puesto::with('user')->get();

        $pdf = PDF::loadView('exports.exportPDF.puestos-pdf', compact('puestos'));

        return $pdf->stream();
        // return $pdf->download('puestos-pdf.pdf');
    }

    public function excel()
    {
        return Excel::download(new PuestosExportExcel, 'puestos-excel.xlsx');
    }

    public function queryExcel()
    {
        request()->validate([
            'search' => 'required'
        ]);

        return (new PuestosExport)->forName(request('search'))->download('puestos.xlsx');
    }
}
