<?php

namespace App\Exports;

use App\Deuda;
use App\Pago;
use App\Puesto;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class SisaRepostQueryExport implements FromView
{
    use Exportable;

    public function forDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function view(): View
    {
        // $sisas = Pago::with(['puesto'])->whereDate('fecha', $this->date)->get();
        // $sisas = Pago::with('puesto')->select('fecha')->distinct()->whereMonth('fecha', $this->date)->get();

        $pagos = Pago::whereDate('fecha', $this->date)->get();
        $deudas = Deuda::whereDate('fecha', $this->date)->get();

        $pago = $pagos->sum('monto_sisa');
        $deuda = $deudas->sum('monto_sisa');
        $agua = $pagos->sum('monto_agua');
        $constancia = $pagos->sum('monto_constancia');
        $remodalacion = $pagos->sum('monto_remodalacion');

        $total_diario = $pago + $deuda + $agua + $constancia + $remodalacion;
        $sisa = $pago + $deuda;

        // $sisas = Puesto::with(['pagos', 'deudas'])
        //         ->whereHas('pagos', function (Builder $query) {
        //             return $query->where('fecha', $this->date);
        //         })
        //         ->whereHas('deudas', function (Builder $query) {
        //             return $query->where('fecha', $this->date);
        //         })
        //         ->get();

        // $fecha = $sisas->pluck('fecha')->unique();
        // $sisa_dia = $sisas->each->puesto->sum('monto_sisa');
        // $sisa_deuda = $sisas->each->puesto->each->deudas->sum('monto_sisa');

        dd($total_diario);
        // dd($sisas->each->puesto->each->deudas->sum('monto_sisa'));
        $khaaa = 'sd';

        return view('exports.exportEXCEL.reporte-sisa', compact('sisas', 'khaaa'));
    }
}
