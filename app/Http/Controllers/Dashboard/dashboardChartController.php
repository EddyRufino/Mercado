<?php

namespace App\Http\Controllers\Dashboard;

use App\Pago;
use App\Deuda;
use App\PagoAnticipado;
use App\Charts\PagoChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardChartController extends Controller
{
    public function index(Request $request)
    {
        $days = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        $today = today()->format('Y-m');
        $dateStart = "{$today}-01";
        $dateLast = "{$today}-31";

        $dataPago = collect([]);
        $dataDeuda = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++)
        {
            $dataPago->push(Pago::whereDate('fecha', $days_backwards)->count());
            $dataDeuda->push(Deuda::whereDate('fecha', $days_backwards)->count());
        }

        $chart = new PagoChart;

        $today = today()->format('M Y');
        $chart->labels($days);
        $chart->dataset("Pago Diario - {$today}", 'line', $dataPago)->backgroundColor('rgba(63, 191, 127, .6)');
        $chart->dataset("Deuda Diaria - {$today}", 'line', $dataDeuda)->backgroundColor('rgba(255, 66, 69, .6)');


        // Count Pays by day
        $pays = Pago::select('monto_remodelacion', 'monto_constancia', 'monto_agua', 'monto_sisa')
                    ->whereMonth('fecha', today()->format('m'))
                    ->whereDay('fecha', today()->format('d'))
                    ->get();

        $remodelacion = $pays->pluck('monto_remodelacion')->sum();
        $constancia = $pays->pluck('monto_constancia')->sum();
        $sisa = $pays->pluck('monto_sisa')->sum();
        $agua = $pays->pluck('monto_agua')->sum();

        $payDay = $remodelacion + $constancia + $sisa + $agua;

        // Count Pays Anticipado by day
        $anticipados = PagoAnticipado::select('monto_agua_anticipada', 'monto_sisa_anticipada')
                    ->whereMonth('fecha', today()->format('m'))
                    ->whereDay('fecha', today()->format('d'))
                    ->get();

        $sisaAnticipado = $anticipados->pluck('monto_sisa_anticipada')->sum();
        $aguaAnticipado = $anticipados->pluck('monto_agua_anticipada')->sum();

        $payAnticipado = $sisaAnticipado + $aguaAnticipado;

        // Count Debts by day
        $deudas = Deuda::select('monto_agua', 'monto_sisa')
                    ->whereMonth('fecha', today()->format('m'))
                    ->whereDay('fecha', today()->format('d'))
                    ->get();

        $sisaDeuda = $deudas->pluck('monto_sisa')->sum();
        $aguaDeuda = $deudas->pluck('monto_agua')->sum();

        $deuda = $sisaDeuda + $aguaDeuda;

        // dd($payDeuda);

        return view('dashboard', compact('chart', 'payDay', 'payAnticipado', 'deuda'));
    }
}
