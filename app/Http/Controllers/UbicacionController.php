<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubicacion;

class UbicacionController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ubicaciones = Ubicacion::latest()->paginate(7);
        return view('ubicaciones.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('ubicaciones.create');
    }

    public function store(Ubicacion $ubicacione)
    {
        request()->validate(['nombre' => 'required']);

        $ubicacion = Ubicacion::create(request()->all());

        return redirect()->route('ubicaciones.index', compact('ubicacion'));
    }

    public function show(Ubicacion $ubicacione)
    {
        //
    }

    public function edit(Request $request, Ubicacion $ubicacione)
    {
        return view('ubicaciones.edit', compact('ubicacione'));
    }

    public function update(Ubicacion $ubicacione)
    {
        request()->validate(['nombre' => 'required']);

        $ubicacione->update(request()->all());

        return redirect()->route('ubicaciones.index', compact('ubicacione'));
    }

    public function destroy(Ubicacion $ubicacione)
    {
        $ubicacione->delete();

        return redirect()->route('ubicaciones.index', $ubicacione)->with('status', 'Tu ubicación fue eliminada.');
    }
}
