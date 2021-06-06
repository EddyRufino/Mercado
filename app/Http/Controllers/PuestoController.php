<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Http\Requests\PuestoRequest;
use App\Puesto;
use App\Ubicacion;
use App\Lista;
use App\User;
use App\lista_puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class PuestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $puestos = Puesto::latest()->paginate(6);
        return view('puestos.index', compact('puestos'));
    }

    public function create()
    {

        $ubicaciones = Ubicacion::select(['id', 'nombre'])->get();
        $actividades = Actividad::select(['id', 'nombre'])->get();

        $lists = DB::table('listas')
                    ->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                            ->from('lista_puesto')
                            ->whereRaw('lista_puesto.lista_id = listas.id');
                   })
                   ->get();

        $users = DB::table('users')
                    ->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                            ->from('puestos')
                            ->whereRaw('puestos.user_id = users.id');
                   })
                   ->get();

        return view('puestos.create', compact('ubicaciones', 'actividades', 'users', 'lists'));
    }

    public function store(PuestoRequest $request)
    {

        // dd($request->all());

        request()->validate(['lista_id' => 'required']); // Valida lista_id

        $puesto = Puesto::create($request->validated());

        $list_puesto = collect($request->lista_id)->unique();
        $puesto->lists()->sync($list_puesto);

        // $puesto->lists()->sync($request->get('lista_id'));

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
        $users = User::select(['id', 'name', 'apellido'])->get();
        // $lists = Lista::select(['id', 'num_puesto'])->get();
        $lists = DB::table('listas')
                    ->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                            ->from('lista_puesto')
                            ->whereRaw('lista_puesto.lista_id = listas.id');
                   })
                   ->orWhereExists(function ($query) use ($puesto) {
                        $query->select(DB::raw(1))
                            ->from('lista_puesto')
                            ->whereColumn('lista_puesto.lista_id', 'listas.id')
                            ->where('lista_puesto.puesto_id', $puesto->id);
                   })
                   ->get();

        return view('puestos.edit', compact('ubicaciones', 'actividades', 'users', 'puesto', 'lists'));
    }

    public function update(PuestoRequest $request, Puesto $puesto)
    {
        request()->validate(['lista_id' => 'required']); // Valida lista_id

        $my_ray = $request->lista_id;

        $puesto->update($request->validated()); // Valida y Actualiza los campos del puesto

        $list_puesto = array_splice($my_ray, 0, -1) ;
        $puesto->lists()->sync($list_puesto);
        // $puesto->lists()->sync($request->get('lista_id'));

        return redirect()->route('puestos.index', compact('puesto'));
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();

        $lists = DB::table('lista_puesto')
                    ->whereExists(function ($query) {
                        $query->select(DB::raw(1))
                            ->from('listas')
                            ->whereRaw('lista_puesto.lista_id = listas.id');
                    })->where('lista_puesto.puesto_id', $puesto->id)->delete();

        // $lists->each->delete();

        return redirect()->route('puestos.index', $puesto)->with('status', 'El puesto fue eliminado.');
    }
}
