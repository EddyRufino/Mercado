<?php

namespace App\Http\Controllers;

use App\Tipo;
use App\Deuda;
use App\Puesto;
use Illuminate\Http\Request;

class DeudaController extends Controller
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Deuda $deuda)
    {
        //
    }

    public function edit(Deuda $deuda)
    {
        $puesto = Puesto::all();
        $tipos = Tipo::all();
        return view('deudas.edit', compact('deuda', 'puesto', 'tipos'));
    }

    public function update(Request $request, Deuda $deuda)
    {
        // dd($request->all());
        $deuda->update($request->all());
        return redirect()->route('deuda.sisa.index');
    }

    public function destroy(Deuda $deuda)
    {
        //
    }
}
