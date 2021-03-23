<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuestoPagoRequest;
use App\Pago;
use App\Puesto;
use App\Tipo;
use Illuminate\Http\Request;

class PuestoPagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create(Puesto $puesto)
    {
        $tipos = Tipo::all();
        return view('puestos.pagos.create', compact('puesto', 'tipos'));
    }

    public function store(PuestoPagoRequest $request, Puesto $puesto)
    {
        $data = Pago::create([
            'fecha' => $request->fecha,
            'num_operacion' => $request->num_operacion,
            'num_recibo' => $request->num_recibo,
            'monto_remodelacion' => $request->monto_remodelacion,
            'monto_constancia' => $request->monto_constancia,
            'monto_agua' => $request->monto_agua,
            'monto_sisa' => $request->monto_sisa,
            'puesto_id' => $puesto->id,
            'tipo_id' => 1,
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
