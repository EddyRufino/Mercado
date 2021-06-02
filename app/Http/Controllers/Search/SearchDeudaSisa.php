<?php

namespace App\Http\Controllers\Search;

use App\Deuda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchDeudaSisa extends Controller
{
    public function index()
    {
        $deudas = Deuda::whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->latest()
                    ->orderBy('fecha')
                    ->paginate(7);

        return view('sisas.deudaSisa.index', compact('deudas'));
    }

    public function search(Request $request)
    {
        $tipo_servicio = $request->get('tipo_servicio');
        $day = $request->get('day');
        $month = $request->get('month');
        $year = $request->get('year');

        $deudas = Deuda::where('tipo_id', $tipo_servicio)
                            ->whereDay('fecha', $day)
                            ->whereMonth('fecha', $month)
                            ->whereYear('fecha', $year)
                            ->latest()
                            ->paginate(5);

        $deudas->appends(['tipo_servicio' => $tipo_servicio]);
        $deudas->appends(['day' => $day]);
        $deudas->appends(['month' => $month]);
        $deudas->appends(['year' => $year]);

        // dd($deudas);

        return view('sisas.deudaSisa.searchDeudaSisaView', compact('deudas'));
    }
}
