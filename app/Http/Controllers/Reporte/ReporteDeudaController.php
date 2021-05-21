<?php

namespace App\Http\Controllers\Reporte;

use App\Exports\DeudasRepostQueryExport;
use App\Exports\PagoAnticipadoExport;
use App\Exports\PagosRepostQueryExport;
use App\Exports\PromocionQueryExport;
use App\Exports\SisaRepostQueryExport;
use App\Exports\TramiteExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteDeudaController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function deuda()
    {
        $date = request()->validate([
            'search' => 'required'
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        $day = request()->validate([
            'day' => 'required'
        ]);

        return (new DeudasRepostQueryExport)->forDate($date, $year, $day)->download('deudas-excel.xlsx');
    }

    public function pago()
    {
        $date = request()->validate([
            'search' => 'required',
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        $day = request()->validate([
            'day' => 'required'
        ]);

        return (new PagosRepostQueryExport)->forDate($date, $year, $day)->download('pagos-excel.xlsx');
    }

    public function sisa()
    {
        $date = request()->validate([
            'search' => 'required'
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        $day = request()->validate([
            'day' => 'required'
        ]);

        return (new PagoAnticipadoExport)->forDate($date, $year, $day)->download('pago-anticipado-mensual.xlsx');
    }

    public function promocion()
    {
        $date = request()->validate([
            'search' => 'required',
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        $day = request()->validate([
            'day' => 'required'
        ]);

        return (new PromocionQueryExport)->forDate($date, $year, $day)->download('promociones-excel.xlsx');
    }

    public function tramite(Request $request)
    {
        $day = $request->day;
        $month = $request->search;
        $year = $request->year;

        return (new TramiteExport)->forDate($day, $month, $year)->download('tramites-excel.xlsx');
    {
      
    public function sisaMonth(Request $request)
    {
        $year = $request->year;
        $month = $request->search;

        return (new SisaRepostQueryExport)->forDate($year, $month)->download('sisa-mes-excel.xlsx');
    }
}
