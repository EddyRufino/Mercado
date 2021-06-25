<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Pago;
use App\Deuda;
use App\Puesto;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoServicioDeudaRequest;

class PuestoServicioDeudaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Pago $pago)
    {
        return view('puestos.servicios.deudas.create', compact('pago'));
    }

    public function store(PuestoServicioDeudaRequest $request, Deuda $deuda)
    {
        $data = Deuda::create([
            'fecha' => $request->fecha,
            'num_recibo' => NULL,
            'monto_agua' => $request->monto_agua,
            'puesto_id' => $puesto->id,
            'tipo_id' => $request->tipo_id,
        ]);

        return redirect()->route('home')->with('status', "La deuda fue procesada con éxito");
    }
}
