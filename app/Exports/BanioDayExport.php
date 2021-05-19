<?php

namespace App\Exports;

use App\Banio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BanioDayExport implements FromView
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
        return view('exports.exportPDF.reporte-banio-day');
    }
}
