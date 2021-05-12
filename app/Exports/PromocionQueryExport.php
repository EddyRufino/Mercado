<?php

namespace App\Exports;

use App\User;
use App\Promocion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PromocionQueryExport implements FromView
{
    use Exportable;

    public function forDate($date, $year, $day)
    {
        $this->date = $date;
        $this->year = $year;
        $this->day = $day;

        return $this;
    }

    public function view(): View
    {
        $wfechaw = "{$this->year['year']}-{$this->date['search']}-{$this->day['day']}";

        $promociones = Promocion::whereDate('fecha_inicio', $wfechaw)
                                    ->orderBy('fecha_inicio', 'ASC')
                                    ->get();

        if (count($promociones) <= 0) {
            $promociones = Promocion::whereYear('fecha_inicio', $this->year)
                                        ->whereMonth('fecha_inicio', $this->date)
                                        ->orderBy('fecha_inicio', 'ASC')
                                        ->get();
        }

        $montoPromo = $promociones->sum('monto');

        return view('exports.exportEXCEL.reporte-promociones', compact('promociones', 'montoPromo'));
    }
}
