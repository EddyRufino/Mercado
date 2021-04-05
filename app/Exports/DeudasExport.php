<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class DeudasExport implements FromCollection
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $deudas = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                        ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                        ->join('deudas', 'puestos.id', '=', 'deudas.puesto_id')
                        ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.sisa_diaria', 'deudas.fecha', 'deudas.monto_agua', 'ubicacions.nombre as ubicacion')
                        ->where('deudas.puesto_id', $this->id)
                        ->get();

        return $deudas;
    }
}
