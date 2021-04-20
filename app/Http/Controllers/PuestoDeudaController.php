<?php

namespace App\Http\Controllers;

use App\Deuda;
use App\Http\Requests\PuestoDeudaRequest;
use App\Pago;
use App\Puesto;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Gate;

class PuestoDeudaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Puesto $puesto)
    {
        $this->authorize('view', $puesto);

        $deudas = Deuda::whereHas('puesto', function (Builder $query) use ($puesto) {
            $query->where('user_id', $puesto->user_id);
        })->paginate(4);

        // dd($deudas);

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
            'monto_sisa' => $request->monto_sisa,
            'puesto_id' => $puesto->id,
            'tipo_id' => 2,
        ]);

        return redirect()->route('home')->with('status', "La deuda fue procesada con éxito!");
    }

    public function destroy(Puesto $puesto, Deuda $deuda)
    {
        $deuda->delete();

        Pago::create([
            'fecha' => $deuda->fecha,
            'num_operacion' => NULL,
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
