<?php

namespace App\Http\Controllers;

use App\User;
use App\Pago;
use App\Deuda;
use App\Puesto;
use App\Talonario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoPagoRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\PuestoDeudaRequest;

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

        return view('puestos.deudas.index', compact('deudas', 'aguaDeudas', 'tazaInicio', 'tazaFin'));
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
        // dd($deuda->tipo_id);
        request()->validate(['num_recibo' => 'required']);

        $deuda->delete();

        $fecha = Carbon::now();
        $fecha = $fecha->format('Y-m-d');

        Pago::create([
            'fecha' => $fecha,
            'fecha_deuda' => $deuda->fecha,
            'num_operacion' => NULL,
            'num_recibo' => request()->num_recibo,
            'monto_remodelacion' => $deuda->monto_remodelacion,
            'monto_constancia' => $deuda->monto_constancia,
            'monto_agua' => $deuda->monto_agua,
            'monto_sisa' => $deuda->monto_sisa,
            'puesto_id' => $puesto->id,
            'tipo_id' => $deuda->tipo_id == 2 ? 1 : 4, // $deuda->tipo_id
        ]);

        Talonario::where('tipo', 1)->update([
            'num_inicio_correlativo' => request()->num_recibo
        ]);

        return back()->with('status', 'Pago de la deuda fue un éxito!');
    }
}
