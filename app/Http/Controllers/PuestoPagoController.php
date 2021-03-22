<?php

namespace App\Http\Controllers;

use App\Puesto;
use App\Tipo;
use Illuminate\Http\Request;

class PuestoPagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create(Puesto $puesto)
    {
        // $puesto = Puesto::all();
        $tipos = Tipo::all();
        return view('puestos.pagos.create', compact('puesto', 'tipos'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
