<?php

namespace App\Http\Controllers\Search;

use App\Pago;
use App\Deuda;
use App\Puesto;
use App\Talonario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchDeudaSisaPersonal extends Controller
{
    public function search(Request $request, Puesto $puesto)
    {
        $now = Carbon::now();

        $deudas = collect([]);
        $aguaDeudas = collect([]);

        if ($request->tipo == '1') {

            $deudas = Deuda::whereBetween('fecha', [$request->dateStart, $request->dateLast])
                    ->where('puesto_id', $request->puesto_id)
                    ->where('tipo_id', 2)
                    ->whereNotNull('monto_sisa')
                    ->get();

            $dias = $deudas->count();

            foreach ($deudas->all() as $deuda) {
                Pago::create([
                    'fecha' => $now,
                    'fecha_deuda' => $deuda->fecha,
                    'num_operacion' => NULL,
                    'monto_deposito' => NULL,
                    'fecha_deposito' => NULL,
                    'num_recibo' => $request->num_recibo,
                    'cant_dia' => $dias,
                    'monto_remodelacion' => $deuda->monto_remodelacion,
                    'monto_constancia' => $deuda->monto_constancia,
                    'monto_agua' => $deuda->monto_agua,
                    'monto_sisa' => $deuda->monto_sisa,
                    'puesto_id' => $deuda->puesto_id,
                    'tipo_id' => $deuda->tipo_id == 2 ? 1 : 4,
                ]);
            }

            $deudas->each->delete();
        }

        if ($request->tipo == '2') {

            $aguaDeudas = Deuda::whereBetween('fecha', [$request->dateStart, $request->dateLast])
                    ->where('puesto_id', $request->puesto_id)
                    ->where('tipo_id', 5)
                    ->whereNotNull('monto_agua')
                    ->get();

            $dias = $aguaDeudas->count();

            foreach ($aguaDeudas->all() as $deuda) {
                Pago::create([
                    'fecha' => $now,
                    'fecha_deuda' => $deuda->fecha,
                    'num_operacion' => NULL,
                    'monto_deposito' => NULL,
                    'fecha_deposito' => NULL,
                    'num_recibo' => $request->num_recibo,
                    'cant_dia' => $dias,
                    'monto_remodelacion' => $deuda->monto_remodelacion,
                    'monto_constancia' => $deuda->monto_constancia,
                    'monto_agua' => $deuda->monto_agua,
                    'monto_sisa' => $deuda->monto_sisa,
                    'puesto_id' => $deuda->puesto_id,
                    'tipo_id' => $deuda->tipo_id == 2 ? 1 : 4,
                ]);
            }

            $aguaDeudas->each->delete();
        }

        // dd($deudas, $aguaDeudas);

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

        if ($deudas->count() > 0 || $aguaDeudas->count() > 0) {
            Talonario::where('tipo', 1)->update([
                'num_inicio_correlativo' => request()->num_recibo
            ]);
        }

        // return view('puestos.deudas.index-search-deudas', compact('deudas', 'aguaDeudas', 'tazaInicio', 'tazaFin'));
        return redirect()->back()->with('status', 'Se registraron los pagos correctamente');
    }

    public function destroy(Request $request)
    {
        // dd($request);
        $deudas = Deuda::whereBetween('fecha', [$request->dateStart, $request->dateLast])->get();
        // Pago::insert([$deudas]);
        // Deuda::whereIn('id', $deudas)->delete();
        dd($deudas->each->delete());

        $now = Carbon::now();
        foreach ($deudas->all() as $deuda) {
            Pago::create([
                'fecha' => $now,
                'fecha_deuda' => $deuda->fecha,
                'num_operacion' => NULL,
                'monto_deposito' => NULL,
                'fecha_deposito' => NULL,
                'num_recibo' => '111',
                'cant_dia' => '1',
                'monto_remodelacion' => $deuda->monto_remodelacion,
                'monto_constancia' => $deuda->monto_constancia,
                'monto_agua' => $deuda->monto_agua,
                'monto_sisa' => $deuda->monto_sisa,
                'puesto_id' => $deuda->puesto_id,
                'tipo_id' => $deuda->tipo_id == 2 ? 1 : 1,
            ]);
        }

        return redirect()->back();
    }
}
