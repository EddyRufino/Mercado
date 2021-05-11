<?php

namespace App\Exports;

use App\PagoAnticipado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PagoAnticipadoExport implements FromView
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

        $pagos = PagoAnticipado::with('puesto')->whereDate('fecha', $wfechaw)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        if (count($pagos) <= 0) {
            $pagos = PagoAnticipado::with('puesto')->whereYear('fecha', $this->year)
                                    ->whereMonth('fecha', $this->date)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();
        }

        $pagoAntipadoSisa = $pagos->sum('monto_sisa_anticipada');
        $pagoAntipadoAgua = $pagos->sum('monto_agua_anticipada');

        return view('exports.exportEXCEL.reporte-pago-anticipados', compact('pagos', 'pagoAntipadoSisa', 'pagoAntipadoAgua'));
    }
}
