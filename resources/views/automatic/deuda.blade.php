@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info font-weight-bold">Generar Deuda Sisa Automatica</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('automatic.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 text-dark col-form-label text-md-right font-weight-normal"
                                    for="fecha"
                                >
                                    Fecha Deuda
                                </label>

                                <div class="col-md-6">
                                    <input class="form-control @error('fecha') is-invalid @enderror"
                                        value="<?php echo date("Y-m-d"); ?>"
                                        min="2018-01-01"
                                        max="2030-12-31"
                                        name="fecha"
                                        type="date"
                                        id="start"
                                        required
                                    >

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-light text-dark">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info font-weight-bold">Generar Deuda Agua Automatica</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('automatic.save') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 text-dark col-form-label text-md-right font-weight-normal"
                                    for="fecha"
                                >
                                    Fecha Deuda
                                </label>

                                <div class="col-md-6">
                                    <input class="form-control @error('fecha') is-invalid @enderror"
                                        value="<?php echo date("Y-m-d"); ?>"
                                        min="2018-01-01"
                                        max="2030-12-31"
                                        name="fechaAgua"
                                        type="date"
                                        id="start"
                                        required
                                    >

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-light text-dark">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
