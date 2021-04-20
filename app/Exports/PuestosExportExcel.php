<?php

namespace App\Exports;

use App\Puesto;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PuestosExportExcel implements FromView
{
    public function view(): View
    {
        $puestos = Puesto::with('user')->get();
        return view('exports.exportEXCEL.puestos-excel', compact('puestos'));
    }

    // public function collection()
    // {
    //     $puestos = Puesto::with('user')->get();

    //     return $puestos;
    // }
}
