<?php

namespace App\Http\Controllers\Reporte;

use App\Exports\DeudasRepostQueryExport;
use App\Exports\PagoAnticipadoExport;
use App\Exports\PagosRepostQueryExport;
use App\Exports\SisaRepostQueryExport;
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

        return (new DeudasRepostQueryExport)->forDate($date, $year)->download('deudas-excel.xlsx');
    }

    public function pago()
    {
        $date = request()->validate([
            'search' => 'required',
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        return (new PagosRepostQueryExport)->forDate($date, $year)->download('pagos-excel.xlsx');
    }

    public function sisa()
    {
        $date = request()->validate([
            'search' => 'required'
        ]);

        $year = request()->validate([
            'year' => 'required'
        ]);

        return (new PagoAnticipadoExport)->forDate($date, $year)->download('pago-anticipado-mensual.xlsx');
    }

}
