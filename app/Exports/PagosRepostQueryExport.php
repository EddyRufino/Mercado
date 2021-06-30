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

        $pagosList = Pago::with('puesto')->whereDate('fecha', $wfechaw)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        if (count($pagosList) <= 0) {
            $pagosList = Pago::with('puesto')->whereYear('fecha', $this->year)
                                        ->whereMonth('fecha', $this->date)
                                        ->orderBy('fecha', 'ASC')
                                        ->get();
        }

        $pagos = $pagosList->unique('num_recibo');

        $pagoSisa = $pagosList->sum('monto_sisa');
        $pagoAgua = $pagosList->sum('monto_agua');
        $pagoRemodelacion = $pagosList->sum('monto_remodelacion');
        $pagoConstancia = $pagosList->sum('monto_constancia');

        return view('exports.exportEXCEL.reporte-pagos', compact('pagos', 'pagoSisa', 'pagoAgua', 'pagoRemodelacion', 'pagoConstancia'));
    }
}
