<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use App\Tipo;
use App\Pago;
use App\Puesto;
use App\Talonario;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoPagoRequest;

class PuestoPagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
        $inicio = Talonario::select('num_inicio_correlativo')
                            ->where('tipo', 1)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $fin = Talonario::select('num_fin')
                            ->where('tipo', 1)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $tipos = Tipo::all();

        $tazaInicio = $inicio->num_inicio_correlativo;
        $tazaFin = $fin->num_fin;

        return view('puestos.pagos.create', compact('puesto', 'tipos', 'tazaInicio', 'tazaFin'));
    }

    public function store(PuestoPagoRequest $request, Puesto $puesto)
    {
        $start = Carbon::create($request->fecha);
        $last = Carbon::create($request->fecha_fin);
        $cant_dia = $start->diffInDays($last);

        for ($i=0; $i <= $cant_dia; $i++) {
            $now = Carbon::create($request->fecha);
            Pago::create([
                'fecha' => $now->addDay($i),
                'num_operacion' => $request->num_operacion,
                'num_recibo' => $request->num_recibo,
                'cant_dia' => $request->cant_dia,
                'monto_sisa' => $request->monto_sisa,
                'puesto_id' => $puesto->id,
                'tipo_id' => $request->tipo_id,
            ]);
        }

        Talonario::where('tipo', 1)->update([
            'num_inicio_correlativo' => $request->num_recibo
        ]);

        return redirect()->route('home')->with('status', "El pago fue procesado con éxito - número de recibo  $request->num_recibo ");
    }
}
