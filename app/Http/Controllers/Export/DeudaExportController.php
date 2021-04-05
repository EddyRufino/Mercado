<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\DeudasExport;
use Illuminate\Http\Request;
use App\User;

class DeudaExportController extends Controller
{
    public function pdf($id)
    {

        $deudas = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                        ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                        ->join('deudas', 'puestos.id', '=', 'deudas.puesto_id')
                        ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.sisa_diaria', 'deudas.fecha', 'deudas.monto_agua', 'ubicacions.nombre as ubicacion')
                        ->where('deudas.puesto_id', $id)
                        ->get();

        $pdf = PDF::loadView('exports.exportPDF.deudas-pdf', compact('deudas'));

        // return $pdf->stream();
        return $pdf->download('deudas-pdf.pdf');
    }

    // php artisan make:export DeudasExport --model=User
    public function excel($id)
    {
        return Excel::download(new DeudasExport($id), 'deudas-excel.xlsx');
    }
}


                        // ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.medidas', 'puestos.sisa', 'puestos.sisa_diaria', 'deudas.fecha', 'deudas.monto_remodelacion', 'deudas.monto_constancia', 'deudas.monto_agua', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
