<?php

namespace App\Http\Controllers;

use App\Talonario;
use Illuminate\Http\Request;
use App\Http\Requests\TalonarioRequest;

class TalonarioController extends Controller
{

    public function index()
    {
        $talonarios = Talonario::latest()->paginate();
        return view('talonarios.index', compact('talonarios'));
    }

    public function create()
    {
        return view('talonarios.create');
    }

    public function store(TalonarioRequest $request)
    {
        Talonario::create([
            'num_inicio' => $request->num_inicio,
            'num_fin' => $request->num_fin,
            'tipo' => $request->tipo,
            'num_inicio_correlativo' => $request->num_inicio - 1
        ]);

        return redirect()->route('talonarios.index');
    }

    public function edit(Talonario $talonario)
    {
        return view('talonarios.edit', compact('talonario'));
    }

    public function update(TalonarioRequest $request, Talonario $talonario)
    {
        //
    }

    public function destroy(Talonario $talonario)
    {
        //
    }
}
