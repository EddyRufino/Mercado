<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Tipo;
use App\Puesto;
use App\Http\Requests\PuestoTramiteRequest;
use Illuminate\Http\Request;

class PuestoTramiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
        return view('puestos.tramites.create', compact('puesto'));
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

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }
}
