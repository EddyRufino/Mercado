<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Pago;
use App\Puesto;
use App\Talonario;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoTramiteRequest;

class PuestoTramiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
        // Obtiene el num del talonario
        $inicio = Talonario::select('num_inicio_correlativo')
                            ->where('tipo', 1)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $fin = Talonario::select('num_fin')
                            ->where('tipo', 1)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $tazaInicio = $inicio->num_inicio_correlativo;
        $tazaFin = $fin->num_fin;

        return view('puestos.tramites.create', compact('puesto', 'tazaInicio', 'tazaFin'));
    }

    public function store(PuestoTramiteRequest $request, Puesto $puesto)
    {
        // dd($request->all());
        $data = Pago::create([
            'fecha' => $request->fecha,
            'num_recibo' => $request->num_recibo,
            'monto_remodelacion' => $request->monto_remodelacion,
            'monto_constancia' => $request->monto_constancia,
            'puesto_id' => $puesto->id,
            'tipo_id' => $request->tipo_id,
        ]);

        Talonario::where('tipo', 1)->update([
            'num_inicio_correlativo' => request()->num_recibo
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }
}
