<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promocion;

class PromocionSearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');

        $promociones = Promocion::where('nombre_empresa', 'like', '%'. $search.'%')
                            ->latest()
                            ->paginate(7);

        $promociones->appends(['search' => $search]);

        return view('searchs.searchPromociones', compact('promociones'));
    }
}
