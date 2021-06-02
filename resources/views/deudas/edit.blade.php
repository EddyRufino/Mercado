@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Deuda',
                        'link' => 'deuda.sisa.index'
                    ])

                    <div class="card-body">
                        <form method="POST" action="{{ route('deudas.update', $deuda) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input id="datepicker" type="date" class="form-control datepicker @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha', $deuda->fecha) }}" min="2018-01-01" max="2030-12-31" autofocus>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Tipo Deuda</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="tipo_id" data-live-search="true">
                                        <option value="2"
                                            {{ old('tipo_id', 2) == $deuda->tipo_id ? 'selected' : '' }}
                                            >Pago Sisa
                                        </option>
                                        <option value="5"
                                            {{ old('tipo_id', 5) == $deuda->tipo_id ? 'selected' : '' }}
                                            >Pago Agua
                                        </option>
                                    </select>

                                    @error('tipo_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_sisa" class="col-md-4 col-form-label text-md-right font-weight-normal">Sisa Diaria</label>

                                <div class="col-md-6">
                                    <input id="monto_sisa" type="text" class="form-control @error('monto_sisa') is-invalid @enderror" name="monto_sisa" value="{{ old('monto_sisa', $deuda->monto_sisa) }}" autocomplete="monto_sisa" autofocus>

                                    @error('monto_sisa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_agua" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Agua</label>

                                <div class="col-md-6">
                                    <input id="monto_agua" type="text" class="form-control @error('monto_agua') is-invalid @enderror" name="monto_agua" value="{{ old('monto_agua', $deuda->monto_agua) }}" autocomplete="monto_agua" autofocus>

                                    @error('monto_agua')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row d-none">

                                <div class="col-md-6">
                                    <input id="puesto_id" type="text" class="form-control @error('puesto_id') is-invalid @enderror" name="puesto_id" value="{{ old('puesto_id', $deuda->puesto_id) }}" autocomplete="puesto_id" autofocus>

                                    @error('puesto_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Editar Deuda
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

