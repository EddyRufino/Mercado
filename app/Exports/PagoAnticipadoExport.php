<?php

namespace App\Exports;

use App\PagoAnticipado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PagoAnticipadoExport implements FromView
{
    use Exportable;

    public function forDate($date, $year)
    {
        $this->date = $date;
        $this->year = $year;

        return $this;
    }

    public function view(): View
    {
        $pagos = PagoAnticipado::with('puesto')->whereYear('fecha', $this->year)
                                    ->whereMonth('fecha', $this->date)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        return view('exports.exportEXCEL.reporte-pago-anticipados', compact('pagos'));
    }
}
