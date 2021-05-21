<?php

namespace App\Http\Controllers\Dashboard;

use App\Promocion;
use Illuminate\Http\Request;
use App\Charts\PromocionChart;
use App\Http\Controllers\Controller;

class PromocionChartController extends Controller
{
    public function index()
    {
        $days = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        $today = today()->format('Y-m');
        $dateStart = "{$today}-01";
        $dateLast = "{$today}-31";

        $dataPromo = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++)
        {
            $dataPromo->push(Promocion::whereDate('fecha_inicio', $days_backwards)->count());
        }

        $chart = new PromocionChart;

        $today = today()->format('M Y');
        $chart->labels($days);
        $chart->dataset("Promociones - {$today}", 'line', $dataPromo)->backgroundColor('rgba(0, 206, 209, .6)');

        $promociones = Promocion::query();

        $promocionCount = $promociones->pluck('monto')->sum();

        return view('dashboards.dashboard-promocion', compact('chart', 'promocionCount'));
    }
}
