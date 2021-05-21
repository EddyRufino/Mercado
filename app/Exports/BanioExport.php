<?php

namespace App\Exports;

Use DB;
use App\Banio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BanioExport implements FromView
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
        $tickets = Banio::query();

        $today = "{$this->year}-{$this->month}";
        $dateStart = "{$today}-01";
        $dateLast = "{$today}-31";

        $dataTicket = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++) {
            $dataTicket->push(
                Banio::whereDate('fecha', $days_backwards)
                        ->addSelect(['total_taza' => Banio::select(DB::raw('SUM(monto_taza)'))
                        ->whereDate('fecha', $days_backwards)
                        ->limit(1)
                    ])
                        ->addSelect(['total_ducha' => Banio::select(DB::raw('SUM(monto_ducha)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_diario' => Banio::select(DB::raw('SUM(monto_taza) + SUM(monto_ducha)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                    ->get()
                    ->unique('fecha')
            );
        }

        $pagoTaza = $tickets->sum('monto_taza');
        $pagoDucha = $tickets->sum('monto_ducha');
        $total = $pagoTaza + $pagoDucha;

        return view('exports.exportEXCEL.reporte-banio-day', compact('dataTicket', 'pagoTaza', 'pagoDucha', 'total'));
    }
}
