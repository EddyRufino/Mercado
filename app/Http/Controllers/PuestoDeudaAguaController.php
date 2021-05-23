<?php

namespace App\Http\Controllers;

use App\Deuda;
use App\Puesto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PuestoDeudaAguaController extends Controller
{
    public function index(Puesto $puesto)
    {
        $aguaDeudas = Deuda::whereHas('puesto', function (Builder $query) use ($puesto) {
            $query->where('user_id', $puesto->user_id)->whereNotNull('monto_agua');
        })->get();

        // No me muestra el puesto poqrque al darle click al href se pierde el puesto
        dd($puesto);
        $deudas = Deuda::all();

        return view('puestos.deudas.deudas-agua', compact('deudas', 'aguaDeudas', 'puesto'));
    }
}
