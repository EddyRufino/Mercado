<?php

namespace App\Http\Controllers;

use App\Deuda;
use App\Pago;
use App\Puesto;
use Illuminate\Http\Request;

class AutomaticDeudaController extends Controller
{
    public function create()
    {
        return view('automatic.deuda');
    }

    public function store(Request $request)
    {
        $puestos = Puesto::all();

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

        return redirect()->back();
    }

    public function save(Request $request)
    {
        $puestos = Puesto::all();

        $puestos->each(function ($item) use ($request) {
            // SISA
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

        return redirect()->back();
    }
}
