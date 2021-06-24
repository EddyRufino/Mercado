<?php

namespace App\Http\Controllers;

use App\Deuda;
use App\Pago;
use App\Puesto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AutomaticDeudaController extends Controller
{
    public function create()
    {
        return view('automatic.deuda');
    }

    public function store(Request $request)
    {
        // $puestos = Puesto::whereDoesntHave('pagos', function (Builder $query) use ($request) {
        //     $query->whereDate('fecha', $request->fecha)->whereNull('monto_agua');
        // })->get();

        $puestos = Puesto::whereDoesntHave('pagos', function (Builder $query) use ($request) {
            $query->whereDate('fecha', $request->fecha)->whereNull('monto_agua');
        })
        ->whereDoesntHave('deudas', function (Builder $query) use ($request) {
            $query->whereDate('fecha', $request->fecha)->whereNull('monto_agua');
        })
        ->get();

        // dd($puestos);

        $puestos->each(function ($item) use ($request) {
            // SISA
            Deuda::create([
                'fecha' => $request->fecha,
                'num_operacion' => NULL,
                'monto_remodelacion' => $item->monto_remodelacion,
                'monto_constancia' => $item->monto_constancia,
                'monto_agua' => NULL,
                'monto_sisa' => $item->sisa_diaria,
                'puesto_id' => $item->id,
                'tipo_id' => 2,
            ]);
        });

        return redirect()->back()->with('status', "Se registro la deuda sisa a todos los comerciantes para la fecha $request->fecha");
    }

    public function save(Request $request)
    {
        $year = Carbon::create($request->fechaAgua)->format('Y');
        $month = Carbon::create($request->fechaAgua)->format('m');

        $puestos = Puesto::whereDoesntHave('pagos', function (Builder $query) use ($year, $month) {
            $query->whereYear('fecha', $year)
                ->whereMonth('fecha', $month)
                ->whereNull('monto_sisa');
        })
        ->whereDoesntHave('deudas', function (Builder $query) use ($year, $month) {
            $query->whereYear('fecha', $year)
                ->whereMonth('fecha', $month)
                ->whereNull('monto_sisa');
        })
        ->get();

        // dd($puestos);

        $puestos->each(function ($item) use ($request) {
            // AGUA
            Deuda::create([
                'fecha' => $request->fechaAgua,
                'num_operacion' => NULL,
                'monto_remodelacion' => $item->monto_remodelacion,
                'monto_constancia' => $item->monto_constancia,
                'monto_agua' => $item->monto_agua,
                'monto_sisa' => NULL,
                'puesto_id' => $item->id,
                'tipo_id' => 5,
            ]);
        });

        return redirect()->back()->with('status', "Se registro la deuda agua a todos los comerciantes para la fecha $month/$year");
    }
}
