<?php

namespace App\Http\Controllers\Reporte;

use App\Banio;
use App\Exports\BanioExport;
use Illuminate\Http\Request;
use App\Exports\BanioDayExport;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class ReporteBanioController extends Controller
{
    public function index()
    {
        return view('reportes.banios.index');
    }

    public function day(Request $request)
    {
        $today = "{$request->year}-{$request->search}-{$request->day}";

        $banioTaza = Banio::query();
        $banioDucha = Banio::query();

        $taza = $banioTaza->whereDate('fecha', $today)->where('tipo_servicio', 1)->get();
        $ducha = $banioDucha->whereDate('fecha', $today)->where('tipo_servicio', 2)->get();

        $desdeTaza = $taza->first();
        $desdeDucha = $ducha->first();

        $hastaTaza = $taza->last();
        $hastaDucha = $ducha->last();

        $tazaCount = $taza->count();
        $duchaCount = $ducha->count();

        $tazaTotal = $taza->sum('monto_taza');
        $duchaTotal = $ducha->sum('monto_ducha');

        $total = $tazaTotal + $duchaTotal;

        $num_operacion = $taza->pluck('num_operacion')->first();
        // dd($num_operacion);

        $pdf = PDF::loadView('exports.exportPDF.reporte-banio-day', compact('desdeTaza', 'desdeDucha', 'hastaTaza', 'hastaDucha', 'tazaCount', 'duchaCount', 'tazaTotal', 'duchaTotal', 'total', 'num_operacion'));

        // return $pdf->stream();
        return $pdf->download('baño-dia.xlsx');
    }

    public function month(Request $request)
    {
        $day = $request->day;
        $month = $request->search;
        $year = $request->year;

        return (new BanioExport)->forDate($day, $month, $year)->download('baños-excel.xlsx');
    }
}
