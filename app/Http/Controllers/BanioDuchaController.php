<?php

namespace App\Http\Controllers;

use App\Banio;
use App\Http\Requests\BanioRequest;
use Illuminate\Http\Request;

class BanioDuchaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('banios.duchas.create');
    }

    public function store(BanioRequest $request)
    {
        Banio::create($request->all());
        return redirect()->route('banios.index');
    }

}
