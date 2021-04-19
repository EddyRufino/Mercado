<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Pago;
use App\Puesto;
use App\User;
use Illuminate\Http\Request;

class SearchComerciante extends Controller
{
    public function search(Request $request, Puesto $puesto)
    {
        // Buscar puesto par apagar
        $search = $request->get('search');

        // $conductores = User::where('apellido', 'like', '%'. $search.'%')
        //                 ->join('puestos', 'users.id', '=', 'puestos.user_id')
        //                 ->select('puestos.id', 'users.name', 'users.apellido', 'puestos.num_puesto')
        //                 ->get();

        // $conductores = User::where('apellido', 'like', '%'. $search.'%')
        //                 ->join('puestos', 'users.id', '=', 'puestos.user_id')
        //                 ->join('lista_puesto', 'puestos.id', '=', 'lista_puesto.puesto_id')
        //                 ->join('listas', 'listas.id', '=', 'lista_puesto.lista_id')
        //                 ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
        //                 ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
        //                 ->select('users.name', 'users.apellido', 'puestos.id', 'puestos.cantidad_puesto', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad', 'listas.num_puesto')
        //                 ->distinct()
        //                 ->get();

        // $conductores = User::has('puestos.lists')->where('apellido', 'like', '%'. $search.'%')->get();

        $conductores = Puesto::with('user')
        ->whereHas('user', function ($query) use ($search) {
            $query->where('apellido', 'like', '%'. $search. '%');
        })
        ->get();

        // dd($conductores);
        // $conductores->appends(['search' => $search]);

        return view('searchs.searchComerciante', compact('conductores', 'puesto'));
    }
}
