<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PuestosExportExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $puestos = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.cantidad_puesto', 'puestos.medidas', 'puestos.sisa', 'puestos.sisa_diaria', 'puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
                ->get();

        return $puestos;
    }
}
