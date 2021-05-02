<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromocionRequest;
use App\Promocion;
use Illuminate\Http\Request;

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
        return view('promociones.create');
    }

    public function store(PromocionRequest $request)
    {
        Promocion::create($request->all());
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
