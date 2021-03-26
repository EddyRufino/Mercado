<?php

namespace App\Http\Controllers;

use App\Deuda;
use App\Http\Requests\PuestoDeudaRequest;
use App\Pago;
use App\Puesto;
use Illuminate\Http\Request;

class PuestoDeudaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Puesto $puesto)
    {
        $deudas = Deuda::where('puesto_id', $puesto->id)->latest()->paginate(4);

        return view('puestos.deudas.index', compact('deudas'));
    }

    public function create(Puesto $puesto)
    {
        return view('puestos.deudas.create', compact('puesto'));
    }

    public function store(PuestoDeudaRequest $request, Puesto $puesto)
    {
        $data = Deuda::create([
            'fecha' => $request->fecha,
            'num_operacion' => $request->num_operacion,
            'monto_remodelacion' => $request->monto_remodelacion,
            'monto_constancia' => $request->monto_constancia,
            'monto_agua' => $request->monto_agua,
            'monto_sisa' => $request->monto_sisa,
            'puesto_id' => $puesto->id,
            'tipo_id' => 2,
        ]);

        return redirect()->route('home')->with('status', "La deuda fue procesada con éxito!");
    }

    public function show($id)
    {
        //
    }

    public function edit(Puesto $puesto)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Puesto $puesto, Deuda $deuda)
    {
        $deuda->delete();

        Pago::create([
            'fecha' => $deuda->fecha,
            'num_operacion' => '',
            'num_recibo' => rand(0, 9999999999),
            'monto_remodelacion' => $deuda->monto_remodelacion,
            'monto_constancia' => $deuda->monto_constancia,
            'monto_agua' => $deuda->monto_agua,
            'monto_sisa' => $deuda->monto_sisa,
            'puesto_id' => $puesto->id,
            'tipo_id' => 1,
        ]);

        return back()->with('status', 'Pago de la deuda fue un éxito!');
    }
}
