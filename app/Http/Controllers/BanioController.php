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
        $tickets = Banio::whereYear('fecha', today()->format('Y'))
                    ->whereMonth('fecha', today()->format('m'))
                    ->whereDay('fecha', today()->format('d'))
                    ->latest()
                    ->paginate(7);
        return view('banios.index', compact('tickets'));
    }

    public function create()
    {
        return view('banios.create');
    }

    public function store(BanioRequest $request)
    {
        Banio::create($request->all());
        return redirect()->route('banios.index');
    }

    public function edit(Banio $banio)
    {
        $ticket = $banio;
        // dd($ticket);
        return view('banios.edit', compact('ticket'));
    }

    public function update(BanioRequest $request, Banio $banio)
    {
        // dd($request->all());
        $banio->update($request->all());

        return redirect()->route('banios.index');
    }

    public function destroy(Banio $banio)
    {
        $banio->delete();

        return redirect()->route('banios.index');
    }
}
