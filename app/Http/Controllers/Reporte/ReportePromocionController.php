<?php

namespace App\Http\Controllers\Reporte;

use App\Exports\PromocionQueryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportePromocionController extends Controller
{
    public function index()
    {
        return view('reportes.promociones.index');
    }

    public function month(Request $request)
    {
        $year = $request->year;
        $month = $request->search;
        $day = $request->day;

        return (new PromocionQueryExport)->forDate($year, $month, $day)->download('promociones-excel.xlsx');
    }
}
