<?php

namespace App\Http\Controllers\Export;

use App\Exports\PuestosExport;
use App\Exports\PuestosExportExcel;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;

class PuestoExportController extends Controller
{
    public function pdf()
    {
        $puestos = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.cantidad_puesto', 'puestos.medidas', 'puestos.sisa', 'puestos.sisa_diaria', 'puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
                ->get();

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
        // dd(request('search'));
        request()->validate([
            'search' => 'required'
        ]);

        return (new PuestosExport)->forName(request('search'))->download('puestos.xlsx');
    }
}
