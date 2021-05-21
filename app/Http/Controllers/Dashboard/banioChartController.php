<?php

namespace App\Http\Controllers\Dashboard;

use App\Banio;
use App\Charts\BanioChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $chart->dataset("Taza - {$today}", 'line', $dataTaza)->backgroundColor('rgba(0, 206, 209, .6)');
        $chart->dataset("Ducha - {$today}", 'line', $dataDucha)->backgroundColor('rgba(218, 165, 32, .6)');

        $banios = Banio::query();
        $baniosDuchaCounts = Banio::query();
        // Count Pays
        $tickets = $banios->select('monto_taza', 'monto_ducha')
                    ->whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->whereDay('fecha', today()->format('d'))
                    ->get();

        $taza = $tickets->pluck('monto_taza')->sum();
        $ducha = $tickets->pluck('monto_ducha')->sum();

        // Count Tickets
        $tazaCount = $banios->select('monto_taza')->where('tipo_servicio', 1)->count();
        $duchaCount = $baniosDuchaCounts->select('monto_ducha')->where('tipo_servicio', 2)->count();

        // dd($duchaCount);

        return view('dashboards/dashboard-banio', compact('chart', 'taza', 'ducha', 'tazaCount', 'duchaCount'));
    }
}
