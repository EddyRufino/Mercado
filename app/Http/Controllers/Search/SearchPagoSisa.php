<?php

namespace App\Http\Controllers\Search;

use App\Pago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchPagoSisa extends Controller
{
    public function index()
    {
        $pagos = Pago::latest()->orderBy('num_recibo')->paginate(7);
        return view('sisas.pagoSisa.index', compact('pagos'));
    }

    public function search()
    {
        # code...
    }
}
