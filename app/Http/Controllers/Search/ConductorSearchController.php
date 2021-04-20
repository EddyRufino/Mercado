<?php

namespace App\Http\Controllers\Search;

use App\Puesto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConductorSearchController extends Controller
{
    public function search(Request $request)
    {
        // Vista conductores
        $search = $request->get('search');

        $conductores = Puesto::with('user')
        ->whereHas('user', function ($query) use ($search) {
            $query->where('apellido', 'like', '%'. $search. '%');
        })
        ->paginate();

        $conductores->appends(['search' => $search]);

        // dd($conductores);
        return view('searchs.searchViewConductor', compact('conductores'));
    }
}
