<?php

namespace App\Exports;

use DB;
use App\User;
use App\Pago;
use App\Deuda;
use App\Puesto;
use Carbon\Carbon;
use App\PagoAnticipado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;

class SisaRepostQueryExport implements FromView
{
    use Exportable;

    private $year;
    private $month;

    public function forDate($year, $month)
    {
        $this->year = $year;
        $this->month = $month;

        return $this;
    }

    public function view(): View
    {
        // $sisas = Pago::with(['puesto'])->whereDate('fecha', $this->date)->get();
        // $sisas = Pago::with('puesto')->select('fecha')->distinct()->whereMonth('fecha', $this->date)->get();

        $pagoQuery = Pago::query();
        $pagoAnticipadoQuery = PagoAnticipado::query();
        $deudaQuery = Deuda::query();

        // dd($deudaDia);

        $today = "{$this->year}-{$this->month}";
        $dateStart = "{$today}-01";
        $dateLast = "{$today}-31";

        $dataPago = collect([]);
        $dataDeuda = collect([]);
        $dataFecha = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++)
        {
            // $dataPago->push(
            //     Pago::whereDate('fecha', $days_backwards)->get()->sum('monto_sisa')
            // );

            // $dataFecha->push($days_backwards);

            $dataPago->push(
                Pago::whereDate('fecha', $days_backwards)
                        ->addSelect(['total_sisa' => Pago::select(DB::raw('SUM(monto_sisa)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_sisa_anticipada' => PagoAnticipado::select(DB::raw('SUM(monto_sisa_anticipada)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_deuda_sisa' => Deuda::select(DB::raw('SUM(monto_sisa)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_agua' => Pago::select(DB::raw('SUM(monto_agua)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_agua_anticipada' => PagoAnticipado::select(DB::raw('SUM(monto_agua_anticipada)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_constancia' => Pago::select(DB::raw('SUM(monto_constancia)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                        ->addSelect(['total_remodelacion' => Pago::select(DB::raw('SUM(monto_remodelacion)'))
                            ->whereDate('fecha', $days_backwards)
                            ->limit(1)
                    ])
                    ->get()
                    ->unique('fecha')
            );
        }
        // dd($dataPago);

        $sisaDia = $pagoQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_sisa');

        $aguaDia = $pagoQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_agua');

        $constanciaDia = $pagoQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_constancia');

        $remodelacionDia = $pagoQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_remodelacion');

        $sisaDiaAnticipada = $pagoAnticipadoQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_sisa_anticipada');

        $aguaDiaAnticipada = $pagoAnticipadoQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_agua_anticipada');

        $deudaDia = $deudaQuery->whereYear('fecha', $this->year)
                        ->whereMonth('fecha', $this->month)
                        ->sum('monto_sisa');

        return view('exports.exportEXCEL.reporte-sisa', compact('dataPago', 'sisaDia', 'sisaDiaAnticipada', 'aguaDiaAnticipada', 'deudaDia', 'aguaDia', 'constanciaDia', 'remodelacionDia'));
    }
}

