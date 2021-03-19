<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;

class ActividadController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $actividades = Actividad::latest()->paginate(7);
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        return view('actividades.create');
    }

    public function store(Actividad $actividade)
    {
        request()->validate(['nombre' => 'required']);

        $actividad = Actividad::create(request()->all());

        return redirect()->route('actividades.index', compact('actividad'));
    }

    public function edit(Request $request, Actividad $actividade)
    {
        return view('actividades.edit', compact('actividade'));
    }

    public function update(Actividad $actividade)
    {
        request()->validate(['nombre' => 'required']);

        $actividade->update(request()->all());

        return redirect()->route('actividades.index', compact('actividade'));
    }

    public function destroy(Actividad $actividade)
    {
        $actividade->delete();

        return redirect()->route('actividades.index', $actividade)->with('status', 'Tu actividad fue eliminada.');
    }
}
