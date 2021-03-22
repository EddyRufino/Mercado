<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Puesto;
use App\Tipo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $puesto = Puesto::all();
        $tipos = Tipo::all();
        return view('pagos.create', compact('puesto', 'tipos'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Pago $pago)
    {
        //
    }

    public function edit(Pago $pago)
    {
        $puesto = Puesto::all();
        return view('pagos.create', compact('pago', 'puesto'));
    }

    public function update(Request $request, Pago $pago)
    {
        //
    }

    public function destroy(Pago $pago)
    {
        //
    }
}
