<?php

namespace App\Http\Controllers\Operacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperacionRequest;
use App\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class OperacionController extends Controller
{
    public function create()
    {
        $pagos = Pago::select('fecha')->distinct()->whereNull('num_operacion')->get();

        return view('operaciones.create', compact('pagos'));
    }
}
