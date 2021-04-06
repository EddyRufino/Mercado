<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PagosRepostQueryExport implements FromQuery
{
    use Exportable;

    public function forDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function query()
    {
        $pagos = User::join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                        ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                        ->join('pagos', 'puestos.id', '=', 'pagos.puesto_id')
                        ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'pagos.num_recibo', 'puestos.sisa_diaria', 'pagos.fecha', 'pagos.num_operacion', 'pagos.monto_agua', 'ubicacions.nombre as ubicacion')
                        ->whereDate('pagos.fecha', $this->date);

        return $pagos;
    }
}
