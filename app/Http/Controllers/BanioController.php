<?php

namespace App\Http\Controllers;

use App\Banio;
use Illuminate\Http\Request;
use App\Http\Requests\BanioRequest;

class BanioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('banios.index');
    }

    public function create()
    {
        return view('banios.create');
    }

    public function store(BanioRequest $request)
    {
        dd($request->all());
    }

    public function show(Banio $banio)
    {
        //
    }

    public function edit(Banio $banio)
    {
        //
    }

    public function update(Request $request, Banio $banio)
    {
        //
    }

    public function destroy(Banio $banio)
    {
        //
    }
}
