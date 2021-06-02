@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Pago',
                        'link' => 'pago.sisa.index'
                    ])

                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.update', $pago) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input id="datepicker" type="date" class="form-control datepicker @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha', $pago->fecha) }}" min="2018-01-01" max="2030-12-31" autofocus>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_deuda" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Concepto(Deuda)</label>

                                <div class="col-md-6">
                                    <input id="datepicker" type="date" class="form-control datepicker @error('fecha_deuda') is-invalid @enderror" name="fecha_deuda" value="{{ old('fecha', $pago->fecha_deuda) }}" min="2018-01-01" max="2030-12-31" autofocus>

                                    @error('fecha_deuda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Recibo</label>

                                <div class="col-md-6">
                                    <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ old('num_recibo', $pago->num_recibo) }}" autocomplete="num_recibo" autofocus>

                                    @error('num_recibo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Tipo Pago</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="tipo_id" data-live-search="true">
                                        <option value="1"
                                            {{ old('tipo_id', 1) == $pago->tipo_id ? 'selected' : '' }}
                                            >Pago Sisa
                                        </option>
                                        <option value="4"
                                            {{ old('tipo_id', 4) == $pago->tipo_id ? 'selected' : '' }}
                                            >Pago Agua
                                        </option>
                                        <option value="3"
                                            {{ old('tipo_id', 3) == $pago->tipo_id ? 'selected' : '' }}
                                            >Pago Trámite
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
                                    <input id="monto_sisa" type="text" class="form-control @error('monto_sisa') is-invalid @enderror" name="monto_sisa" value="{{ old('monto_sisa', $pago->monto_sisa) }}" autocomplete="monto_sisa" autofocus>

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
                                    <input id="monto_agua" type="text" class="form-control @error('monto_agua') is-invalid @enderror" name="monto_agua" value="{{ old('monto_agua', $pago->monto_agua) }}" autocomplete="monto_agua" autofocus>

                                    @error('monto_agua')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_constancia" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Constancia</label>

                                <div class="col-md-6">
                                    <input id="monto_constancia" type="text" class="form-control @error('monto_constancia') is-invalid @enderror" name="monto_constancia" value="{{ old('monto_constancia', $pago->monto_constancia) }}" autocomplete="monto_constancia" autofocus>

                                    @error('monto_constancia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_remodelacion" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Remodelación</label>

                                <div class="col-md-6">
                                    <input id="monto_remodelacion" type="text" class="form-control @error('monto_remodelacion') is-invalid @enderror" name="monto_remodelacion" value="{{ old('monto_remodelacion', $pago->monto_remodelacion) }}" autocomplete="monto_remodelacion" autofocus>

                                    @error('monto_remodelacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-none">
                                {{-- <label for="monto_remodelacion" class="col-md-4 col-form-label text-md-right font-weight-normal">Puesto</label> --}}

                                <div class="col-md-6">
                                    <input id="puesto_id" type="text" class="form-control @error('puesto_id') is-invalid @enderror" name="puesto_id" value="{{ old('puesto_id', $pago->puesto_id) }}" autocomplete="puesto_id" autofocus>

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
                                        Editar Pago
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

