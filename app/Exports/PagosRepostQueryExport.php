<?php

namespace App\Exports;

use App\Pago;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PagosRepostQueryExport implements FromView
{
    use Exportable;

    public function forDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function view(): View
    {
        $pagos = Pago::with('puesto')->where('fecha', $this->date)->get();

        return view('exports.exportEXCEL.reporte-pagos', compact('pagos'));
    }

    // public function query()
    // {
    //     $pagos = User::join('puestos', 'users.id', '=', 'puestos.user_id')
    //                     ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
    //                     ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
    //                     ->join('pagos', 'puestos.id', '=', 'pagos.puesto_id')
    //                     ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'pagos.num_recibo', 'puestos.sisa_diaria', 'pagos.fecha', 'pagos.num_operacion', 'pagos.monto_agua', 'ubicacions.nombre as ubicacion')
    //                     ->whereDate('pagos.fecha', $this->date);

    //     return $pagos;
    // }
}
