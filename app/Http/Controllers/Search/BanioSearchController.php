<?php

namespace App\Http\Controllers\Search;

use App\Banio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanioSearchController extends Controller
{
    public function search(Request $request)
    {
        $tipo_servicio = $request->get('tipo_servicio');
        $day = $request->get('day');
        $month = $request->get('month');
        $year = $request->get('year');

        $banios = Banio::where('tipo_servicio', $tipo_servicio)
                            ->whereDay('fecha', $day)
                            ->whereMonth('fecha', $month)
                            ->whereYear('fecha', $year)
                            ->latest()
                            ->paginate(5);

        $banios->appends(['tipo_servicio' => $tipo_servicio]);
        $banios->appends(['day' => $day]);
        $banios->appends(['month' => $month]);
        $banios->appends(['year' => $year]);

        return view('searchs.banioSearchView', compact('banios'));
    }
}
