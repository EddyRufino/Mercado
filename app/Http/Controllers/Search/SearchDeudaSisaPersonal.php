<?php

namespace App\Http\Controllers\Search;

use App\Deuda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchDeudaSisaPersonal extends Controller
{
    public function search(Request $request)
    {
        $deudas = Deuda::whereBetween('fecha', [$request->dateStart, $request->dateLast])->get();
        dd($deudas);
    }
}
