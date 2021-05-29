<?php

namespace App\Http\Controllers;

use App\Promocion;
use App\Talonario;
use Illuminate\Http\Request;
use App\Http\Requests\PromocionRequest;

class PromocionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $promociones = Promocion::latest()->paginate();
        return view('promociones.index', compact('promociones'));
    }

    public function create()
    {
        $inicio = Talonario::select('num_inicio_correlativo')
                            ->where('tipo', 1)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $fin = Talonario::select('num_fin')
                            ->where('tipo', 1)
                            ->orderBy('created_at', 'desc')
                            ->first();

        $tazaInicio = $inicio->num_inicio_correlativo;
        $tazaFin = $fin->num_fin;

        return view('promociones.create', compact('tazaInicio', 'tazaFin'));
    }

    public function store(PromocionRequest $request)
    {
        Promocion::create($request->all());

        Talonario::where('tipo', 1)->update([
            'num_inicio_correlativo' => $request->num_recibo
        ]);

        return redirect()->route('promociones.index');
    }

    public function show(Promocion $promocione)
    {
        //
    }

    public function edit(Promocion $promocione)
    {
        //
    }

    public function update(Request $request, Promocion $promocione)
    {
        //
    }

    public function destroy(Promocion $promocione)
    {
        $promocione->delete();
        return redirect()->route('promociones.index')->with('status', 'La promoción fue eliminada.');
    }
}
