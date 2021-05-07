<?php

namespace App\Exports;

use App\Promocion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PromocionesExport implements FromView
{
    public function view(): View
    {
        $promociones = Promocion::all();
        return view('exports.exportEXCEL.promociones-excel', compact('promociones'));
    }
}
