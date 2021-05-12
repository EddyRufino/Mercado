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

        $deudas = Deuda::with('puesto')->whereDate('fecha', $wfechaw)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        if (count($deudas) <= 0) {
            $deudas = Deuda::with('puesto')->whereYear('fecha', $this->year)
                                    ->whereMonth('fecha', $this->date)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();
        }

        $deudaSisa = $deudas->sum('monto_sisa');
        $deudaAgua = $deudas->sum('monto_agua');

        return view('exports.exportEXCEL.reporte-deudas', compact('deudas', 'deudaSisa', 'deudaAgua'));
    }
}
