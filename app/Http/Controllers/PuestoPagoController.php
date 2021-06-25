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
        $request->validate([
            'fecha' => 'required|date',
            'fecha_fin' => 'required|date|date_format:Y-m-d|after_or_equal:fecha',
        ]);

        $start = Carbon::create($request->fecha);
        $last = Carbon::create($request->fecha_fin);
        $cant_dia = $start->diffInDays($last);

        // $cant_dia = $cant_dia == 0 ? $cant_dia + 1 : $cant_dia;

        // dd($cant_dia);

        for ($i=0; $i <= $cant_dia; $i++) {
            $now = Carbon::create($request->fecha);
            Pago::create([
                'fecha' => $now->addDay($i),
                'num_operacion' => $request->num_operacion,
                'num_recibo' => $request->num_recibo,
                'cant_dia' => $cant_dia == 0 ? $cant_dia + 1 : $cant_dia + 1,
                'monto_sisa' => $request->monto_sisa,
                'puesto_id' => $puesto->id,
                'tipo_id' => $request->tipo_id,
            ]);
        }

        Talonario::where('tipo', 1)->update([
            'num_inicio_correlativo' => $request->num_recibo
        ]);

        $cant_dias = $cant_dia == 0 ? $cant_dia + 1 : $cant_dia + 1;

        return redirect()->route('home')->with('status', "Pago exitoso desde $request->fecha hasta $request->fecha_fin - Suma $cant_dias día(s) más pagados - número de recibo  $request->num_recibo");
    }
}
