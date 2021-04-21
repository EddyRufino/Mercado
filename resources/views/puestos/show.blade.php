@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                        <span class="w-100">{{ $puesto->user->name }} {{ $puesto->user->apellido }} <strong>-</strong> Puesto {{ $puesto->lists->pluck('num_puesto')->implode(', ') }}</span>
                        <a href="{{ route('conductores.index') }}" class="flex-shrink-1" data-toggle="tooltip" data-placement="top" title="Atrás">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">Actividad:</label>

                                    <div class="col-md-6">
                                        <span class="form-control">{{ $puesto->actividad->nombre }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">Ubicación:</label>

                                    <div class="col-md-6">
                                        <span class="form-control">{{ $puesto->ubicacion->nombre }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">Cant. Puesto:</label>

                                    <div class="col-md-6">
                                        <span class="form-control">{{ $puesto->cantidad_puesto }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">Medidas:</label>

                                    <div class="col-md-6">
                                        <span class="form-control">{{ $puesto->medidas }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">Sisa Puesto:</label>

                                    <div class="col-md-6">
                                        <span class="form-control">S/. {{ $puesto->sisa }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">Sisa Diaria:</label>

                                    <div class="col-md-6">
                                        <span class="form-control">S/. {{ $puesto->sisa_diaria }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_puesto" class="col-form-label col-md-4 text-md-right font-weight-normal">R. Exposición:</label>

                            <div class="col-md-4">
                                <span class="form-control">{{ $puesto->riesgo_exposicion }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
