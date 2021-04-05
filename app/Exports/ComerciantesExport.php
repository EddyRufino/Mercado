<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComerciantesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $conductores = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                        ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                        ->select('users.name', 'users.apellido', 'users.dni', 'puestos.num_puesto','puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
                        ->get();

        return $conductores;
    }
}
