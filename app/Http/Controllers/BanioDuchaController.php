<?php

namespace App\Http\Controllers;

use App\Banio;
use App\Talonario;
use Illuminate\Http\Request;
use App\Http\Requests\BanioRequest;

class BanioDuchaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $duchaInicio = Talonario::where('tipo', 3)->pluck('num_inicio_correlativo')->implode(' ');
        $duchaFin = Talonario::where('tipo', 3)->pluck('num_fin')->implode(' ');
        // dd($duchaFin);

        return view('banios.duchas.create', compact('duchaInicio', 'duchaFin'));
    }

    public function store(BanioRequest $request)
    {

        Talonario::where('id', 3)->update([
            'num_inicio_correlativo' => $request->num_correlativo
        ]);

        Banio::create($request->all());

        return redirect()->route('banios.index');
    }

}
