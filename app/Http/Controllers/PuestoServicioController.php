<?php

namespace App\Http\Controllers;

use App\Deuda;
use App\Http\Requests\PuestoServicioDeudaRequest;
use App\Http\Requests\PuestoServicioRequest;
use App\Pago;
use App\Puesto;
use App\Tipo;
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

    /** Aquí para deudas **/

    public function deuda(Puesto $puesto)
    {
        return view('puestos.servicios.deudas.create', compact('puesto'));
    }

    public function save(PuestoServicioDeudaRequest $request, Puesto $puesto)
    {
        // dd($request->all());
        $data = Deuda::create([
            'fecha' => $request->fecha,
            'num_operacion' => NULL,
            'monto_agua' => $request->monto_agua,
            'puesto_id' => $puesto->id,
            'tipo_id' => $request->tipo_id,
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }
}
