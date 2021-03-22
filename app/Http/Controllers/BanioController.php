<?php

namespace App\Http\Controllers;

use App\Banio;
use Illuminate\Http\Request;

class BanioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Banio  $banio
     * @return \Illuminate\Http\Response
     */
    public function show(Banio $banio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banio  $banio
     * @return \Illuminate\Http\Response
     */
    public function edit(Banio $banio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banio  $banio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banio $banio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banio  $banio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banio $banio)
    {
        //
    }
}
