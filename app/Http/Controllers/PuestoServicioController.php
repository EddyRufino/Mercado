<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Pago;
use App\Deuda;
use App\Puesto;
use App\Talonario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoServicioRequest;
use App\Http\Requests\PuestoServicioDeudaRequest;

class PuestoServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Puesto $puesto)
    {
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

        return view('puestos.servicios.create', compact('puesto', 'tazaInicio', 'tazaFin'));
    }

    public function store(PuestoServicioRequest $request, Puesto $puesto)
    {
        // $cant_dia = 8;
        // $today = Carbon::now()->endOfMonth()->addMonth($cant_dia)->toDateString();
        // $today = Carbon::create()->endOfMonth()->modify("+1 month");
        // dd(Carbon::now()->endOfMonth()->addMonth($cant_dia)->format('m'));
        // dd(Carbon::create($request->fecha)->addMonths(4)->format('m'));
        // dd(Carbon::create($request->fecha)->startOfMonth()->endOfMonth()->toDateString());
        $request->validate([
            'fecha' => 'required|date|date_format:Y-m-d|before:fecha_fin',
            'fecha_fin' => 'required|date|date_format:Y-m-d|after:fecha',
        ]);

        $start = Carbon::create($request->fecha);
        $last = Carbon::create($request->fecha_fin);
        $cant_dia = $start->diffInMonths($last);
        // dd($cant_dia);

        for ($i=1; $i <= $cant_dia; $i++) {
            $now = Carbon::create($request->fecha);
            $data = Pago::create([
                'fecha' => date("Y-m-t", strtotime($now->startOfMonth()->addMonth($i)->subSeconds(1)->toDateTimeString())),
                'num_recibo' => $request->num_recibo,
                'cant_dia' => $cant_dia,
                'monto_agua' => $request->monto_agua,
                'puesto_id' => $puesto->id,
                'tipo_id' => $request->tipo_id,
            ]);
        }

        if ($cant_dia > 0) {
            Talonario::where('tipo', 1)->update([
                'num_inicio_correlativo' => request()->num_recibo
            ]);
        }


        // $cant_dias = $cant_dia == 0 ? $cant_dia + 1 : $cant_dia;

        return redirect()->route('home')->with('status', "Pago exitoso desde $request->fecha hasta $request->fecha_fin - Suma $cant_dia mes(es) más pagados - número de recibo  $request->num_recibo ");
    }

    /** Aquí para deudas **/

    public function deuda(Puesto $puesto)
    {
        return view('puestos.servicios.deudas.create', compact('puesto'));
    }

    public function save(PuestoServicioDeudaRequest $request, Puesto $puesto)
    {
        $request->validate([
            'fecha' => 'required|date|date_format:Y-m-d|before:fecha_fin',
            'fecha_fin' => 'required|date|date_format:Y-m-d|after:fecha',
        ]);

        $start = Carbon::create($request->fecha);
        $last = Carbon::create($request->fecha_fin);
        $cant_dia = $start->diffInMonths($last);
        // dd($cant_dia);

        for ($i=1; $i <= $cant_dia; $i++) {
            $now = Carbon::create($request->fecha);
            $data = Deuda::create([
                'fecha' => date("Y-m-t", strtotime($now->startOfMonth()->addMonth($i)->subSeconds(1)->toDateTimeString())),
                'num_operacion' => NULL,
                'monto_agua' => $request->monto_agua,
                'puesto_id' => $puesto->id,
                'tipo_id' => $request->tipo_id,
            ]);
        }

        // $cant_dias = $cant_dia == 0 ? $cant_dia + 1 : $cant_dia;

        // $data = Deuda::create([
        //     'fecha' => $request->fecha,
        //     'num_operacion' => NULL,
        //     'monto_agua' => $request->monto_agua,
        //     'puesto_id' => $puesto->id,
        //     'tipo_id' => $request->tipo_id,
        // ]);

        return redirect()->route('home')->with('status', "Registro exitoso desde $request->fecha hasta $request->fecha_fin - Suma $cant_dia mes(es) más sin pagar.");
    }
}
