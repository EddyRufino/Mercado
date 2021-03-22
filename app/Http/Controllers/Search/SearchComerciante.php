<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Pago;
use App\Puesto;
use App\User;
use Illuminate\Http\Request;

class SearchComerciante extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');

        $conductores = User::where('apellido', 'like', '%'. $search.'%')->paginate();
        $conductores->appends(['search' => $search]);

        return view('searchs.searchComerciante', compact('conductores'));
    }
}
