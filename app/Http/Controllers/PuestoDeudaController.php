<?php

namespace App\Http\Controllers;

use App\User;
use App\Pago;
use App\Deuda;
use App\Puesto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoDeudaRequest;
use Illuminate\Database\Eloquent\Builder;

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
            $query->where('user_id', $puesto->user_id)->whereNotNull('monto_sisa');
        })->orderBy('fecha', 'asc')->paginate(4);

        $aguaDeudas = Deuda::whereHas('puesto', function (Builder $query) use ($puesto) {
            $query->where('user_id', $puesto->user_id)->whereNotNull('monto_agua');
        })->orderBy('fecha', 'asc')->paginate(4);

        // dd($deudas);

        return view('puestos.deudas.index', compact('deudas', 'aguaDeudas'));
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

        $fecha = Carbon::now();
        $fecha = $fecha->format('Y-m-d');

        Pago::create([
            'fecha' => $fecha,
            'fecha_deuda' => $deuda->fecha,
            'num_operacion' => NULL,
            'num_recibo' => rand(0, 9999999999),
            'monto_remodelacion' => $deuda->monto_remodelacion,
            'monto_constancia' => $deuda->monto_constancia,
            'monto_agua' => $deuda->monto_agua,
            'monto_sisa' => $deuda->monto_sisa,
            'puesto_id' => $puesto->id,
            'tipo_id' => $deuda->tipo_id,
        ]);

        return back()->with('status', 'Pago de la deuda fue un éxito!');
    }
}
