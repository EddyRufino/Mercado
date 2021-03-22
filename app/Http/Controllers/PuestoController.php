<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Http\Requests\PuestoRequest;
use App\Puesto;
use App\Ubicacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $ubicaciones = Ubicacion::select(['id', 'nombre'])->get();
        $actividades = Actividad::select(['id', 'nombre'])->get();
        $users = DB::table('users')
                   ->whereNotExists(function ($query) {
                       $query->select(DB::raw(1))
                             ->from('puestos')
                             ->whereRaw('puestos.user_id = users.id');
                   })
                   ->get();

        // dd($users);

        return view('puestos.create', compact('ubicaciones', 'actividades', 'users'));
    }

    public function store(PuestoRequest $request)
    {
        $puesto = Puesto::create($request->validated());

        return redirect()->route('puestos.index', compact('puesto'));
    }

    public function show(Puesto $puesto)
    {
        return view('puestos.show', compact('puesto'));
    }

    public function edit(Puesto $puesto)
    {
        $ubicaciones = Ubicacion::select(['id', 'nombre'])->get();
        $actividades = Actividad::select(['id', 'nombre'])->get();
        $users = User::select(['id', 'name'])->get();

        return view('puestos.edit', compact('ubicaciones', 'actividades', 'users', 'puesto'));
    }

    public function update(PuestoRequest $request, Puesto $puesto)
    {
        $puesto->update($request->validated());

        return redirect()->route('puestos.index', compact('puesto'));
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();

        return redirect()->route('puestos.index', $puesto)->with('status', 'El puesto fue eliminado.');
    }
}
