<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Puesto;
use App\PagoAnticipado;
use Illuminate\Http\Request;

class PagoAnticipadoControlController extends Controller
{
    public function edit(PagoAnticipado $pagosanticipado)
    {
        $puesto = Puesto::all();
        $tipos = Tipo::all();
        return view('pagoAnticipados.edit', compact('pagosanticipado', 'puesto', 'tipos'));
    }

    public function update(Request $request, PagoAnticipado $pagosanticipado)
    {
        // dd($request->all());
        $pagosanticipado->update($request->all());
        return redirect()->route('pagoanticipado.sisa.index');
    }
}
