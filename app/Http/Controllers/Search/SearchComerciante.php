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
        // Buscar puesto para pagar
        $search = $request->get('search');

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
