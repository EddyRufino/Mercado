<?php

namespace App\Exports;

use App\Puesto;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ComerciantesExport implements FromView
{
    public function view(): View
    {
        $conductores = Puesto::with('user')->get();
        return view('exports.exportEXCEL.comerciantes-excel', compact('conductores'));
    }

    // public function collection()
    // {
    //     $conductores = User::join('puestos', 'users.id', '=', 'puestos.user_id')
    //                     ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
    //                     ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
    //                     ->select('users.name', 'users.apellido', 'users.dni', 'puestos.num_puesto','puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
    //                     ->get();

    //     return $conductores;
    // }
}
