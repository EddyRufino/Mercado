<?php

namespace App\Http\Controllers\Operacion;

use App\Promocion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperacionPromocionController extends Controller
{
    public function create()
    {
        $promociones = Promocion::select('fecha_inicio')
                            ->distinct()
                            ->whereNull('num_operacion')
                            ->get();

        return view('operaciones.promociones.create', compact('promociones'));
    }

    public function store(Request $request, Promocion $promocion)
    {
        request()->validate([
            'num_operacion' => 'required',
            'monto_deposito' => 'required',
            'fecha_deposito' => 'required'
        ]);

        $promociones = Promocion::where('fecha_inicio', $request->fecha_inicio)->get();

        $promociones->each->update([
            'num_operacion' => $request->num_operacion,
            'monto_deposito' => $request->monto_deposito,
            'fecha_deposito' =>$request->fecha_deposito
        ]);

        return redirect()->route('operacion.promocion.create')->with('status', 'Número de operación registrado!');
    }
}
