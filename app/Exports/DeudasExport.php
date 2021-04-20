<?php

namespace App\Exports;

use App\Deuda;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DeudasExport implements FromView
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $deudas = Deuda::with('puesto')->where('puesto_id', $this->id)->get();

        return view('exports.exportEXCEL.deudas-excel', compact('deudas'));
    }

    // public function collection()
    // {
    //     $deudas = User::join('puestos', 'users.id', '=', 'puestos.user_id')
    //                     ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
    //                     ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
    //                     ->join('deudas', 'puestos.id', '=', 'deudas.puesto_id')
    //                     ->select('users.name', 'users.apellido', 'puestos.num_puesto', 'puestos.sisa_diaria', 'deudas.fecha', 'deudas.monto_agua', 'ubicacions.nombre as ubicacion')
    //                     ->where('deudas.puesto_id', $this->id)
    //                     ->get();

    //     return $deudas;
    // }
}
