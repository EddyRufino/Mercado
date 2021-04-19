<?php

namespace App\Http\Controllers\Search;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConductorSearchController extends Controller
{
    public function search(Request $request, User $user)
    {
        // Vista conductores
        $search = $request->get('search');

        $conductores = User::where('apellido', 'like', '%'. $search.'%')
                        ->join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->join('ubicacions', 'ubicacions.id', '=', 'puestos.ubicacion_id')
                        ->join('actividads', 'actividads.id', '=', 'puestos.actividad_id')
                        ->select('users.name', 'users.apellido', 'puestos.id', 'users.dni', 'puestos.num_puesto','puestos.riesgo_exposicion', 'ubicacions.nombre as ubicacion', 'actividads.nombre as actividad')
                        ->orWhere('puestos.num_puesto', 'like', '%'. $search.'%')
                        ->paginate();

        $conductores->appends(['search' => $search]);

        // dd($conductores);
        return view('searchs.searchViewConductor', compact('conductores'));
    }
}
