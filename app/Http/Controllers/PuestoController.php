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
        // $users = User::select(['id', 'name'])->get();

        $usersID = DB::table('users')
            ->select('id')
            ->get();


        $users = DB::table('puestos')
                ->joinSub($usersID, 'user_id', function ($join) {
                    $join->on('users.id', '=', 'usersID.user_id');
                })->get();


        // $users = DB::table('users')
        //     ->join('puestos', 'users.id', '=', 'puestos.user_id')
        //     ->where('users.id', '<>', 'puestos.user_id')
        //     ->select('users.id', 'users.name')
        //     ->distinct()
        //     ->get();


        // $users = User::all();

        dd($users);

        return view('puestos.create', compact('ubicaciones', 'actividades', 'users'));
    }

    public function store(PuestoRequest $request)
    {
        $puesto = Puesto::create($request->validated());

        return redirect()->route('puestos.index', compact('puesto'));
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
