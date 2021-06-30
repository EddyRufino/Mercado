<?php

namespace App\Exports;

use App\Pago;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PagosRepostQueryExport implements FromView
{
    use Exportable;

    public function forDate($date, $year, $day)
    {
        $this->date = $date;
        $this->year = $year;
        $this->day = $day;

        return $this;
    }

    public function view(): View
    {
        $wfechaw = "{$this->year['year']}-{$this->date['search']}-{$this->day['day']}";

        // $pagos = Pago::with('puesto')->whereDate('fecha', $wfechaw)
        //                             ->orderBy('fecha', 'ASC')
        //                             ->get();


        $pagosList = Pago::with('puesto')->whereDate('fecha', $wfechaw)
                                    ->orderBy('fecha', 'ASC')
                                    ->get();

        $pagos = $pagosList->unique('num_recibo');


        // $recibos = Pago::pluck('num_recibo')->unique()->values()->all();

        // dd($recibos);

        // $pagos = Pago::with('puesto')->whereDate('fecha', $wfechaw)
        //                         ->addSelect(['total_agua' => Pago::where('num_recibo', '30234')->sum('monto_agua')

        //                         ])
        //                         ->orderBy('fecha', 'ASC')
        //                         ->get();

        // dd($recibos->first());
        // $dateStart = $recibos->first();
        // $dateLast = $recibos->last();
        // $dataPago = collect([]);

        // foreach ($recibos as $days_backwards) {
        //     $dataPago->push(
        //         Pago::whereDate('fecha', $wfechaw)
        //             ->get()
        //     );
        // }

        // dd($dataPago);

        // foreach ($recibos as $days_backwards) {
        // for ($days_backwards = $dateStart; $days_backwards <= $dateLast; $days_backwards++) {
            // $dataPago->push(
            //                 Pago::with('puesto')->whereDate('fecha', $wfechaw)
            //                     ->addSelect(['total_sisa' => Pago::select(\DB::raw('SUM(monto_sisa)'))
            //                             ->where('num_recibo', $days_backwards)
            //                     ])
            //                     ->orderBy('fecha', 'ASC')
            //                     ->get()
            //                     ->unique('num_recibo')
            //                     ->values()
            //                 );





        // $dataPago->push(
            // Pago::with('puesto')->whereDate('fecha', $wfechaw)
            //                     ->addSelect(['total_sisa' => Pago::select(\DB::raw('SUM(monto_sisa)'))
            //                             ->where('num_recibo', $days_backwards)
            //                     ])
            //                         ->orderBy('fecha', 'ASC')
            //                         ->where('num_recibo', $days_backwards)
            //                         // ->sum('monto_sisa')
            //                         ->get()
            // );


        // Pago::with('puesto')->whereDate('fecha', $wfechaw)
        //                         ->addSelect(['total_sisa' => Pago::select(\DB::raw('MAX(fecha_deuda)'))
        //                                 ->where('num_recibo', $days_backwards)

        //                         ])
        //                         ->get()
        //     );
        // }

        // $orders = \DB::table('pagos')
        // ->join('puestos', 'puestos.id', '=', 'pagos.puesto_id')
        // ->join('users', 'users.id', '=', 'puestos.user_id')
        // ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
        // ->join('lista_puesto', 'lista_puesto.puesto_id', '=', 'puestos.id')
        // ->join('listas', 'listas.id', '=', 'lista_puesto.lista_id')
        // ->select(
        //     'pagos.fecha', 'listas.num_puesto', 'ubicacions.nombre', 'users.name', 'pagos.num_recibo', 'pagos.monto_sisa',
        //     \DB::raw('SUM(pagos.monto_sisa) as total_sisa'),
        //     \DB::raw('MIN(pagos.fecha_deuda) as start_date'),
        //     \DB::raw('MAX(pagos.fecha_deuda) as last_date'),
        // )
        // ->groupBy('pagos.fecha', 'listas.num_puesto', 'ubicacions.nombre', 'users.name', 'pagos.num_recibo', 'pagos.monto_sisa')
        // ->get();

        // $orders = Pago::select(
        //     'fecha', 'num_recibo', 'monto_sisa',
        //     \DB::raw('SUM(pagos.monto_sisa) as total_sisa'),
        //     \DB::raw('MIN(pagos.fecha_deuda) as start_date'),
        //     \DB::raw('MAX(pagos.fecha_deuda) as last_date')
        // )
        // ->groupBy('fecha', 'num_recibo', 'monto_sisa')
        // ->get();

        // dd($orders);





        // $collection = collect($pagos);

        // $unique = $collection->unique('num_recibo');

        // $unique->values();

        // dd($unique);


        if (count($pagos) <= 0) { // pagosList
            $pagos = Pago::with('puesto')->whereYear('fecha', $this->year)
                                        ->whereMonth('fecha', $this->date)
                                        ->orderBy('fecha', 'ASC')
                                        ->get();
        }

        // $dataPagod = collect([]);
        // foreach ($recibos as $recibo) {
        //     $dataPagod->push($pagos->where('num_recibo', $recibo)->sum('monto_sisa'));
        // }
        // $sw = $pagos->unique('num_recibo');

        // $plo = $sw->union($dataPagod);
        // dd($plo);

        $pagoSisa = $pagosList->sum('monto_sisa');
        $pagoAgua = $pagosList->sum('monto_agua');
        $pagoRemodelacion = $pagosList->sum('monto_remodelacion');
        $pagoConstancia = $pagosList->sum('monto_constancia');

        return view('exports.exportEXCEL.reporte-pagos', compact('pagos', 'pagoSisa', 'pagoAgua', 'pagoRemodelacion', 'pagoConstancia'));
    }
}
