<?php

namespace App\Http\Controllers;

use App\Banio;
use App\Http\Requests\BanioRequest;
use App\Talonario;
use Illuminate\Http\Request;

class BanioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = Banio::whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->whereDay('fecha', today()->format('d'))
                    ->latest()
                    ->paginate(7);
        return view('banios.index', compact('tickets'));
    }

    public function create(Talonario $talonario)
    {
        $inicio = Talonario::select('num_inicio_correlativo')->where('tipo', 2)->orderBy('created_at', 'desc')->first();
        $fin = Talonario::select('num_fin')->where('tipo', 2)->orderBy('created_at', 'desc')->first();

        $tazaInicio = $inicio->num_inicio_correlativo;
        $tazaFin = $fin->num_fin;
        // dd($fin);
        return view('banios.create', compact('tazaInicio', 'tazaFin'));
    }

    public function store(BanioRequest $request)
    {

        Talonario::where('tipo', 2)->update([
            'num_inicio_correlativo' => $request->num_correlativo
        ]);

        Banio::create($request->all());

        return redirect()->route('banios.index');
    }

    public function edit(Banio $banio)
    {
        $ticket = $banio;

        return view('banios.edit', compact('ticket'));
    }

    public function update(BanioRequest $request, Banio $banio)
    {
        $banio->update($request->all());

        return redirect()->route('banios.index');
    }

    public function destroy(Banio $banio)
    {
        $banio->delete();

        return redirect()->route('banios.index');
    }
}
