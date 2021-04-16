<?php

namespace App\Http\Controllers\Search;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PuestoSearchController extends Controller
{
    public function search(Request $request, User $user)
    {
        // dd($request->get('search'));
        $search = $request->get('search');

        $puestos = User::where('apellido', 'like', '%'. $search.'%')
                        ->join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->join('lista_puesto', 'puestos.id', '=', 'lista_puesto.puesto_id')
                        ->join('listas', 'listas.id', '=', 'lista_puesto.lista_id')
                        ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                        ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                        ->select('users.name', 'users.apellido', 'puestos.id', 'puestos.cantidad_puesto', 'puestos.medidas', 'puestos.sisa', 'puestos.sisa_diaria', 'puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad', 'listas.num_puesto')
                        ->orWhere('listas.num_puesto', 'like', '%'. $search.'%')
                        ->distinct()
                        ->paginate();
        // dd($puestos);
        $puestos->appends(['search' => $search]);

        // dd($users);
        return view('searchs.searchPuesto', compact('puestos'));
    }
}

        // $users = User::whereHas('puestos', function($q) use ($search)
        // {
        //     $q->where('apellido', 'like', '%'. $search.'%')
        //         ->orWhere('num_puesto', 'like', '%'. $search.'%');

        // })->get();

        // $users = User::with(['puestos', 'ubicacion'])->where('apellido', 'like', '%'. $search.'%')->get();


        //      Está funciono!
        // $users = User::with(['puestos'])->whereHas('puestos', function($q) use ($search)
        //         {
        //             $q->where('apellido', 'like', '%'. $search.'%')
        //                 ->orWhere('num_puesto', 'like', '%'. $search.'%');
        //         })->get();

