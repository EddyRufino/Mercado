@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Pago Anticipado',
                        'link' => 'pagoanticipado.sisa.index'
                    ])

                    <div class="card-body">
                        <form method="POST" action="{{ route('pagosanticipados.update', $pagosanticipado) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input id="datepicker" type="date" class="form-control datepicker @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha', $pagosanticipado->fecha) }}" min="2018-01-01" max="2030-12-31" autofocus>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha_anticipada" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Pago Anticipado</label>

                                <div class="col-md-6">
                                    <input id="datepicker" type="date" class="form-control datepicker @error('fecha_anticipada') is-invalid @enderror" name="fecha_anticipada" value="{{ old('fecha', $pagosanticipado->fecha_anticipada) }}" min="2018-01-01" max="2030-12-31" autofocus>

                                    @error('fecha_anticipada')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Recibo</label>

                                <div class="col-md-6">
                                    <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ old('num_recibo', $pagosanticipado->num_recibo) }}" autocomplete="num_recibo" autofocus>

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
                                        <option value="6"
                                            {{ old('tipo_id', 6) == $pagosanticipado->tipo_id ? 'selected' : '' }}
                                            >Sisa Anticipada
                                        </option>
                                        <option value="7"
                                            {{ old('tipo_id', 7) == $pagosanticipado->tipo_id ? 'selected' : '' }}
                                            >Agua Anticipada
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
                                <label for="monto_sisa_anticipada" class="col-md-4 col-form-label text-md-right font-weight-normal">Sisa Diaria</label>

                                <div class="col-md-6">
                                    <input id="monto_sisa_anticipada" type="text" class="form-control @error('monto_sisa_anticipada') is-invalid @enderror" name="monto_sisa_anticipada" value="{{ old('monto_sisa_anticipada', $pagosanticipado->monto_sisa_anticipada) }}" autocomplete="monto_sisa_anticipada" autofocus>

                                    @error('monto_sisa_anticipada')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_agua_anticipada" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Agua</label>

                                <div class="col-md-6">
                                    <input id="monto_agua_anticipada" type="text" class="form-control @error('monto_agua_anticipada') is-invalid @enderror" name="monto_agua_anticipada" value="{{ old('monto_agua_anticipada', $pagosanticipado->monto_agua_anticipada) }}" autocomplete="monto_agua_anticipada" autofocus>

                                    @error('monto_agua_anticipada')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-none">
                                {{-- <label for="monto_remodelacion" class="col-md-4 col-form-label text-md-right font-weight-normal">Puesto</label> --}}

                                <div class="col-md-6">
                                    <input id="puesto_id" type="text" class="form-control @error('puesto_id') is-invalid @enderror" name="puesto_id" value="{{ old('puesto_id', $pagosanticipado->puesto_id) }}" autocomplete="puesto_id" autofocus>

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

