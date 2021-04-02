<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComerciantesExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\User;

class ComercianteExportController extends Controller
{
    public function pdf()
    {
        $conductores = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                    ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                    ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                    ->select('users.name', 'users.apellido', 'users.dni', 'puestos.num_puesto','puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
                    ->get();

        $pdf = PDF::loadView('exports.exportPDF.conductores-pdf', compact('conductores'));

        return $pdf->stream();
        // return $pdf->download('conductores-pdf.pdf');
    }

    // php artisan make:export UsersExport --model=User
    public function excel()
    {
        return Excel::download(new ComerciantesExport, 'comerciantes-excel.xlsx');
    }
}
