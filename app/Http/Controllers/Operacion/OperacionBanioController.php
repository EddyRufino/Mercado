<?php

namespace App\Http\Controllers\Operacion;

use App\Banio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperacionBanioController extends Controller
{
    public function create()
    {
        $banios = Banio::select('fecha')->distinct()->whereNull('num_operacion')->get();

        return view('operaciones.banios.create', compact('banios'));
    }

    public function store(Request $request, Banio $banio)
    {
        request()->validate([
            'num_operacion' => 'required',
            'monto_deposito' => 'required',
            'fecha_deposito' => 'required'
        ]);

        $banios = Banio::where('fecha', $request->fecha)->get();

        $banios->each->update([
            'num_operacion' => $request->num_operacion,
            'monto_deposito' => $request->monto_deposito,
            'fecha_deposito' =>$request->fecha_deposito
        ]);

        return redirect()->route('operacion.banio.create')->with('status', 'Número de operación registrado!');
    }
}
