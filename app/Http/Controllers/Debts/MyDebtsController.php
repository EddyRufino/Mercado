<?php

namespace App\Http\Controllers\Debts;

use App\Deuda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class MyDebtsController extends Controller
{
    public function index()
    {
        $deudas = Deuda::whereHas('puesto', function (Builder $query) {
            $query->where('user_id', auth()->id())->whereNotNull('monto_sisa');
        })->paginate(4);

        return view('MyDebts.index', compact('deudas'));
    }
}
