<?php

namespace App\Http\Controllers\Reporte;

use App\Exports\DeudasRepostQueryExport;
use App\Exports\PagosRepostQueryExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReporteDeudaController extends Controller
{
    public function index()
    {
        return view('Reportes.index');
    }

    public function deuda()
    {
        $date = request()->validate([
            'search' => 'required'
        ]);

        return (new DeudasRepostQueryExport)->forDate($date)->download('deudas-excel.xlsx');
    }

    public function pago()
    {
        $date = request()->validate([
            'search' => 'required'
        ]);

        return (new PagosRepostQueryExport)->forDate($date)->download('pagos-excel.xlsx');
    }

}
