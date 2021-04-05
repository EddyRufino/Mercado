<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DeudasRepostQueryExport;
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

}
