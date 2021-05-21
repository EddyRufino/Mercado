<?php

namespace App\Http\Controllers\Dashboard;

use App\Pago;
use App\Banio;
use App\Promocion;
use App\PagoAnticipado;
use App\Charts\generalChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralChartController extends Controller
{
    public function index(Request $request)
    {
        $sisas = Pago::query();
        $sisaAnticipados = PagoAnticipado::query();
        $banios = Banio::query();
        $promos = Promocion::query();

        $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $dateStart = "1";
        $dateLast = "12";

        $dataPago = collect([]);
        $dataBanio = collect([]);
        $dataPromo = collect([]);

        for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++)
        {
            $dataPago->push(Pago::whereMonth('fecha', $days_backwards)->count());
            $dataBanio->push(Banio::whereMonth('fecha', $days_backwards)->count());
            $dataPromo->push(Promocion::whereMonth('fecha_inicio', $days_backwards)->count());
        }

        $chart = new generalChart;

        $today = today()->format('M Y');
        $chart->labels($months);
        $chart->dataset("Sisa - {$today}", 'line', $dataPago)->backgroundColor('rgba(63, 191, 127, .6)');
        $chart->dataset("Baño - {$today}", 'line', $dataBanio)->backgroundColor('rgba(250, 250, 0, .6)');
        $chart->dataset("Promoción - {$today}", 'line', $dataPromo)->backgroundColor('rgba(128, 128, 128, .6)');

        // Count Sisa - Sisa Anticipada Pays
        $pays = $sisas->select('monto_remodelacion', 'monto_constancia', 'monto_agua', 'monto_sisa')
                    ->whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->get();

        $paysAnticipado = $sisaAnticipados->select( 'monto_agua_anticipada', 'monto_sisa_anticipada')
                    ->whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->get();

        $remodelacion = $pays->pluck('monto_remodelacion')->sum();
        $constancia = $pays->pluck('monto_constancia')->sum();
        $sisa = $pays->pluck('monto_sisa')->sum();
        $agua = $pays->pluck('monto_agua')->sum();

        $sisaAnticipada = $paysAnticipado->pluck('monto_sisa_anticipada')->sum();
        $aguaAnticipada = $paysAnticipado->pluck('monto_agua_anticipada')->sum();

        $payDay = $remodelacion + $constancia + $sisa + $agua;
        $payDayAnticipado = $sisaAnticipada + $aguaAnticipada;

        $payMonthSisa = $payDay + $payDayAnticipado;

        // Count Baños Pays
        $paysBanios = $banios->select('monto_taza', 'monto_ducha')
                    ->whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->get();

        $taza = $paysBanios->pluck('monto_taza')->sum();
        $ducha = $paysBanios->pluck('monto_ducha')->sum();

        $payMonthBanio = $taza + $ducha;

        // Count Promociones Pays
        $paysPromos = $promos->select('monto')
                    ->whereYear('fecha_inicio', today()->format('Y'))
                    ->whereMonth('fecha_inicio', today()->format('m'))
                    ->get();

        $payMonthPromo = $paysPromos->pluck('monto')->sum();

        return view('dashboards.dashboard-general', compact('chart', 'payMonthSisa', 'payMonthBanio', 'payMonthPromo'));
    }
}
