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
use DateTime;
use DateInterval;
use DatePeriod;
use DB;
use Carbon\Carbon;

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


        $fechas = collect(['2021-05-01', '2021-05-02', '2021-05-03', '2021-05-04', '2021-05-05']);

        // $sisas = Puesto::addSelect(['count_sisa' => Pago::selectRaw('SUM(monto_sisa)')
        //             ->whereColumn('puesto_id', 'puestos.id')
        //             ->whereDate('fecha', $this->date)
        //             ->limit(1)
        //         ])->get()
        //         ->unique('fecha');

        // $deudas = Puesto::addSelect(['count_sisa' => Deuda::selectRaw('SUM(monto_sisa)')
        //             ->whereColumn('puesto_id', 'puestos.id')
        //             ->whereDate('fecha', $this->date)
        //             ->limit(1)
        //         ])->get()
        //         ->unique('fecha');



        // $sisas = Pago::addSelect(['count_sisa' => Pago::selectRaw('SUM(monto_sisa)')
        //             ->whereDate('fecha', $this->date)
        //             ->limit(1)
        //         ])->get()
        //         ->unique('fecha')


        // $sisas = DB::table('Pagos')
        //         ->select('monto_sisa', DB::raw('count(*) as user_count, monto_sisa  '))
        //         ->whereDate('fecha', $this->date)
        //         ->groupBy('monto_sisa')
        //         ->havingRaw('SUM(monto_sisa)')
        //         ->get();


        // dd($sisas);


        $sisa_anti = Pago::where('fecha', '>', Carbon::now());


        $sisas  = Pago::whereMonth('fecha', $this->date)->orderBy('fecha', 'ASC')->get();
        // $deudas = Deuda::whereDate('fecha', $this->date)->get()->unique('fecha');

        // La más cercana a la meta
        // $sisas  = Pago::where('fecha', '<=', $this->date)
        //             ->addSelect(['total_sisa' => Pago::select(DB::raw('SUM(monto_sisa)'))
        //                 ->where('fecha', '<=', $this->date)
        //                 ->limit(1)
        //             ])
        //             ->get()
        //             ->unique('fecha');

        // dd($sisas);

        // $sisas = Pago::whereMonth('fecha', '05')
        //                 ->get()
        //                 ->unique('fecha');

        $fecha1 = "2021-05-01";
        $fecha2 = "2021-05-05";

        for($i = $fecha1; $i <= $fecha2; $i = date("Y-m-d", strtotime($i ."+ 1 days"))){
            // echo $i . "<br />";
         //aca puedes comparar $i a una fecha en la bd y guardar el resultado en un arreglo

            $pagos = Pago::select('monto_sisa')->whereMonth('fecha', '05')
                ->each(function ($item) use ($i) {
                                $item->whereDate('fecha', $i)
                                ->get()
                                ->sum('monto_sisa');
                });
        }








        // $sisas = DB::table('pagos')
        //             ->join('puestos', 'puestos.id', '=', 'pagos.puesto_id')
        //             ->where(function ($query) {
        //                 $query->select(DB::raw(1))
        //                      ->from('deudas')
        //                      ->whereRaw('deudas.puesto_id = deudas.id');
        //             })
        //             ->get();



        // $sisas = Pago::whereMonth('fecha', $this->date)->get();

        // $start = new DateTime('2021-05-01');
        // $last = new DateTime('2021-05-03');

        // dd($pagos);
        // dd($deudas);

        // for ($date = $start; $date <= $last; $date++) {
            // $monto_sisa = Pago::whereDate('fecha', $this->date)->whereDate('fecha', $this->date)->get()->sum('monto_sisa');
            // $sisas = Pago::whereDate('fecha', $this->date)->whereDate('fecha', $this->date)->get()->unique('fecha');


            // $sisas = Pago::join('puestos', 'puestos.id', '=', 'pagos.puesto_id')
            //                 ->join('deudas', 'deudas.id', '=', 'deudas.puesto_id')
            //                 ->whereDate('pagos.fecha', $this->date)
            //                 ->orWhere(function($query) {
            //                     $query->whereDate('deudas.fecha', $this->date);
            //                 })
            //                 ->select('pagos.fecha', 'pagos.monto_sisa as sisa_pago', 'deudas.monto_sisa as sisa_deuda')
            //                 ->get()
            //                 ->unique('pagos.fecha');

        // $sees = collect(['2021-05-01', '2021-05-02', '2021-05-03', '2021-05-04', '2021-05-05']);

        // $sees->each(function ($item, $key) {
        //     dd($item);
        // });


        // }
            // $sisas->each(function ($sisa) {
            //     dd($sisa->where('fecha', $this->date)->sum('monto_sisa'));
            // });
        // dd($fecha->pluck('fecha'));
        // $fd = $sisas->map(function($sisa, $key) use ($last) {
        //     return $sisa->where('fecha', $last);
        // });



        // for ($datew = $start; $datew <= $last; $datew++) {
            // $sisas = Pago::whereDate('fecha', $this->date)->whereDate('fecha', $this->date)->get()->unique('fecha');
        // }




        // $pago = $pagos->sum('monto_sisa');
        // $deuda = $deudas->sum('monto_sisa');
        // $agua = $pagos->sum('monto_agua');
        // $constancia = $pagos->sum('monto_constancia');
        // $remodalacion = $pagos->sum('monto_remodalacion');

        // $total_diario = $pago + $deuda + $agua + $constancia + $remodalacion;
        // $sisa = $pago + $deuda;

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

        // dd($total_diario);
        // dd($sisas->each->puesto->each->deudas->sum('monto_sisa'));
        $khaaa = 'sd';

        return view('exports.exportEXCEL.reporte-sisa', compact('sisas', 'pagos'));
    }
}
