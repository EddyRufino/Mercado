<?php

namespace App\Http\Controllers\Debts;

use App\Deuda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class MyDebtsAguaController extends Controller
{
    public function index()
    {
        $aguaDeudas = Deuda::whereHas('puesto', function (Builder $query) {
            $query->where('user_id', auth()->id())->whereNotNull('monto_agua');
        })->paginate(4);

        $deudas = Deuda::all();

        return view('MyDebts.debt-agua', compact('aguaDeudas', 'deudas'));
    }
}
