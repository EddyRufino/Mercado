<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Puesto;
use Carbon\Carbon;
use App\PagoAnticipado;
use Illuminate\Http\Request;
use App\Http\Requests\PagoAnticipadoRequest;

class AguaAnticipadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
        $tipos = Tipo::all();
        return view('puestos.agua_anticipados.create', compact('puesto', 'tipos'));
    }

    public function store(PagoAnticipadoRequest $request, Puesto $puesto)
    {
        $fecha = Carbon::now();
        $fecha = $fecha->format('Y-m-d'); // La fecha esta delantada por un par de horas, quitalas si quieres
        // dd($request->all());
        $data = PagoAnticipado::create([
            'fecha' => $fecha,
            'fecha_anticipada' => $request->fecha_anticipada,
            'num_operacion' => NULL,
            'num_recibo' => $request->num_recibo,
            'monto_deposito' => NULL,
            'fecha_deposito' => NULL,
            'monto_agua_anticipada' => $request->monto_agua_anticipada,
            'monto_sisa_anticipada' => NULL,
            'puesto_id' => $puesto->id,
            'tipo_id' => $request->tipo_id,
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito $request->num_recibo ");
    }
}
