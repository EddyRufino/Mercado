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
        $search = $request->get('search');

        // $conductores = User::where('apellido', 'like', '%'. $search.'%')->paginate();
        $conductores = User::where('apellido', 'like', '%'. $search.'%')
                        ->join('puestos', 'users.id', '=', 'puestos.user_id')
                        ->select('puestos.id', 'users.name', 'users.apellido', 'puestos.num_puesto')
                        ->get();
        // dd($conductores);
        // $conductores->appends(['search' => $search]);

        return view('searchs.searchComerciante', compact('conductores', 'puesto'));
    }
}
