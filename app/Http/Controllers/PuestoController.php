<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;

class PuestoController extends Controller
{
    public function __constructor()
    {
        //
    }

    public function index()
    {
        $puestos = Puesto::latest()->paginate(7);
        return view('puestos.index', compact('puestos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Puesto $puesto)
    {
        //
    }

    public function edit(Puesto $puesto)
    {
        //
    }

    public function update(Request $request, Puesto $puesto)
    {
        //
    }

    public function destroy(Puesto $puesto)
    {
        //
    }
}
