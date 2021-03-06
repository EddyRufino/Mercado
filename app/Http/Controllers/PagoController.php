<?php

namespace App\Http\Controllers;

use App\Pago;
use App\PagoAnticipado;
use App\Puesto;
use App\Tipo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $puesto = Puesto::all();
        $tipos = Tipo::all();
        return view('pagos.create', compact('puesto', 'tipos'));
    }

    public function store(Request $request, Pago $pago)
    {
        request()->validate([
            'num_operacion' => 'required',
            'monto_deposito' => 'required',
            'fecha_deposito' => 'required'
    ]);

        $pagos = Pago::where('fecha', $request->fecha)->get();
        $pagoAnticopados = PagoAnticipado::where('fecha', $request->fecha)->get();

        $pagos->each->update([
            'num_operacion' => $request->num_operacion,
            'monto_deposito' => $request->monto_deposito,
            'fecha_deposito' =>$request->fecha_deposito
        ]);

        $pagoAnticopados->each->update([
            'num_operacion' => $request->num_operacion,
            'monto_deposito' => $request->monto_deposito,
            'fecha_deposito' =>$request->fecha_deposito
        ]);

        return redirect()->route('operaciones.create')->with('status', 'Número de operación registrado!');
    }

    public function show(Pago $pago)
    {
        //
    }

    public function edit(Pago $pago)
    {
        $puesto = Puesto::all();
        $tipos = Tipo::all();
        return view('pagos.edit', compact('pago', 'puesto', 'tipos'));
    }

    public function update(Request $request, Pago $pago)
    {
        // dd($request->all());
        $pago->update($request->all());
        return redirect()->route('pago.sisa.index');
    }

    public function destroy(Pago $pago)
    {
        //
    }
}
