<?php

namespace App\Exports;

use App\Pago;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TramiteExport implements FromView
{
    use Exportable;

    public function forDate($day, $month, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;

        return $this;
    }

    public function view(): View
    {
        $wfechaw = "{$this->year}-{$this->month}-{$this->day}";

        $tramites = Pago::with('puesto')->whereDate('fecha', $wfechaw)
                                    ->where('tipo_id', 3)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        if (!empty($tramites)) {
            $tramites = Pago::with('puesto')->whereYear('fecha', $this->year)
                                        ->whereMonth('fecha', $this->month)
                                        ->where('tipo_id', 3)
                                        ->orderBy('fecha', 'ASC')
                                        ->get();
        }

        $pagoRemodelacion = $tramites->sum('monto_remodelacion');
        $pagoConstancia = $tramites->sum('monto_constancia');

        return view('exports.exportEXCEL.reporte-tramites', compact('tramites', 'pagoRemodelacion', 'pagoConstancia'));
    }
}
