<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deuda;

class DeudaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Deuda $deuda)
    {
        //
    }

    public function edit(Deuda $deuda)
    {
        //
    }

    public function update(Request $request, Deuda $deuda)
    {
        //
    }

    public function destroy(Deuda $deuda)
    {
        //
    }
}
