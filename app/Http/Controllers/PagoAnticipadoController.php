<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Puesto;
use Carbon\Carbon;
use App\Talonario;
use App\PagoAnticipado;
use Illuminate\Http\Request;
use App\Http\Requests\PagoAnticipadoRequest;

class PagoAnticipadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
        $tipos = Tipo::all();

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

        return view('puestos.pago_anticipados.create', compact('puesto', 'tipos', 'tazaInicio', 'tazaFin'));
    }

    public function store(PagoAnticipadoRequest $request, Puesto $puesto)
    {
        $fecha = Carbon::now();
        $fecha = $fecha->format('Y-m-d');
        // dd($request->all());
        $data = PagoAnticipado::create([
            'fecha' => $fecha,
            'fecha_anticipada' => $request->fecha_anticipada,
            'num_operacion' => NULL,
            'num_recibo' => $request->num_recibo,
            'monto_deposito' => NULL,
            'fecha_deposito' => NULL,
            'monto_agua_anticipada' => NULL, // jalar el monto del agua tienes que ponerlo  en un campo del puesto
            'monto_sisa_anticipada' => $request->monto_sisa_anticipada,
            'puesto_id' => $puesto->id,
            'tipo_id' => $request->tipo_id,
        ]);

        Talonario::where('tipo', 1)->update([
            'num_inicio_correlativo' => $request->num_recibo
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }
}
