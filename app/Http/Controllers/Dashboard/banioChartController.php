<?php

namespace App\Http\Controllers\Dashboard;

use App\Banio;
use App\Charts\BanioChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class banioChartController extends Controller
{
    public function index()
    {
        $days = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        $today = today()->format('Y-m');
        $dateStart = "{$today}-01";
        $dateLast = "{$today}-31";

        $dataTaza = collect([]);
        $dataDucha = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++)
        {
            $dataTaza->push(Banio::whereDate('fecha', $days_backwards)->whereNotNull('monto_taza')->count());
            $dataDucha->push(Banio::whereDate('fecha', $days_backwards)->whereNotNull('monto_ducha')->count());
        }

        $chart = new BanioChart;

        $today = today()->format('M Y');
        $chart->labels($days);
        $chart->dataset("Taza Diario - {$today}", 'line', $dataTaza)->backgroundColor('rgba(63, 191, 127, .6)');
        $chart->dataset("Ducha Diaria - {$today}", 'line', $dataDucha)->backgroundColor('rgba(255, 66, 69, .6)');


        return view('dashboards/dashboard-banio', compact('chart'));
    }
}
