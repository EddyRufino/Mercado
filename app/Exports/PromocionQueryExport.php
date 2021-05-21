<?php

namespace App\Exports;

use App\Promocion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PromocionQueryExport implements FromView
{
    use Exportable;

    public function forDate($year, $month, $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;

        return $this;
    }

    public function view(): View
    {
        $wfechaw = "{$this->year}-{$this->month}-{$this->day}";

        $promociones = Promocion::whereDate('fecha_inicio', $wfechaw)
                                    ->orderBy('fecha_inicio', 'ASC')
                                    ->get();

        if (count($promociones) <= 0) {
            $promociones = Promocion::whereYear('fecha_inicio', $this->year)
                                        ->whereMonth('fecha_inicio', $this->month)
                                        ->orderBy('fecha_inicio', 'ASC')
                                        ->get();
        }

        $montoPromo = $promociones->sum('monto');

        return view('exports.exportEXCEL.reporte-promociones', compact('promociones', 'montoPromo'));
    }
}
