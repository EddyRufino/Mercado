<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Tipo;
use App\Puesto;
use App\Http\Requests\PuestoServicioRequest;
use Illuminate\Http\Request;

class PuestoServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
        return view('puestos.servicios.create', compact('puesto'));
    }

    public function store(PuestoServicioRequest $request, Puesto $puesto)
    {
        $data = Pago::create([
            'fecha' => $request->fecha,
            'num_recibo' => $request->num_recibo,
            'monto_agua' => $request->monto_agua,
            'puesto_id' => $puesto->id,
            'tipo_id' => $request->tipo_id,
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }
}
