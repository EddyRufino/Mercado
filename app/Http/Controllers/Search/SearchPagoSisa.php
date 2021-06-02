<?php

namespace App\Http\Controllers\Search;

use App\Pago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchPagoSisa extends Controller
{
    public function index()
    {
        $pagos = Pago::whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->latest()
                    ->orderBy('num_recibo')
                    ->paginate(7);

        return view('sisas.pagoSisa.index', compact('pagos'));
    }

    public function search(Request $request)
    {
        $tipo_servicio = $request->get('tipo_servicio');
        $day = $request->get('day');
        $month = $request->get('month');
        $year = $request->get('year');

        $pagos = Pago::where('tipo_id', $tipo_servicio)
                            ->whereDay('fecha', $day)
                            ->whereMonth('fecha', $month)
                            ->whereYear('fecha', $year)
                            ->latest()
                            ->paginate(5);

        $pagos->appends(['tipo_servicio' => $tipo_servicio]);
        $pagos->appends(['day' => $day]);
        $pagos->appends(['month' => $month]);
        $pagos->appends(['year' => $year]);

        // dd($pagos);

        return view('sisas.pagoSisa.searchPagoSisaView', compact('pagos'));
    }
}
