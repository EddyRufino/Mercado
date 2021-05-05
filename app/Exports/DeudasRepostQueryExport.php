<?php

namespace App\Exports;

use App\Deuda;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class DeudasRepostQueryExport implements FromView
{
    use Exportable;

    private $date;

    public function forDate($date, $year)
    {
        $this->date = $date;
        $this->year = $year;

        return $this;
    }

    public function view(): View
    {
        $deudas = Deuda::with('puesto')->whereYear('fecha', $this->year)
                                    ->whereMonth('fecha', $this->date)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        return view('exports.exportEXCEL.reporte-deudas', compact('deudas'));
    }

    // public function query()
    // {
    //     $deudas = User::join('puestos', 'users.id', '=', 'puestos.user_id')
    //                     ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
    //                     ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
    //                     ->join('deudas', 'puestos.id', '=', 'deudas.puesto_id')
    //                     ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.sisa_diaria', 'deudas.fecha', 'deudas.monto_agua', 'ubicacions.nombre as ubicacion')
    //                     ->whereDate('deudas.fecha', $this->date);

    //     return $deudas;
    // }

}
