<?php

namespace App\Http\Controllers;

use App\Puesto;
use Illuminate\Http\Request;

class ComercianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductores = Puesto::latest()->paginate(7);
        return view('conductores.index', compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comerciante  $comerciante
     * @return \Illuminate\Http\Response
     */
    public function show(Comerciante $comerciante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comerciante  $comerciante
     * @return \Illuminate\Http\Response
     */
    public function edit(Comerciante $comerciante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comerciante  $comerciante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comerciante $comerciante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comerciante  $comerciante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comerciante $comerciante)
    {
        //
    }
}
