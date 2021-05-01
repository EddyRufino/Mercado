@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-3">
                    <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                        <span class="w-100">
                            {{ $puesto->user->name }} {{ $puesto->user->apellido }} <strong>-</strong> Puesto {{ $puesto->lists->pluck('num_puesto')->implode(',  ') }}
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.pagos.store', $puesto) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    {{-- <input id="datepicker" type="text" class="form-control datepicker @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required readonly> --}}
                                    <input type="date" id="start" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                                           value="<?php echo date("Y-m-d"); ?>"
                                           min="2018-01-01" max="2030-12-31" required>
{{-- <?php echo date("Y-m-d"); ?> --}}
                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_sisa" class="col-md-4 col-form-label text-md-right font-weight-normal">Sisa Diaria</label>

                                <div class="col-md-6">
                                    <input id="monto_sisa" type="text" class="form-control @error('monto_sisa') is-invalid @enderror" name="monto_sisa" value="{{ $puesto->sisa_diaria }}" required autocomplete="monto_sisa" autofocus readonly>

                                    @error('monto_sisa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Tipo Pago</label>

                                <div class="col-md-6">

                                    <div class="dropdown">
                                        <button class="btn-s btn-select dropdown-toggle w-100" id="dropdownMenu2"    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pago Sisa
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('puestos.deudas.create', $puesto->id) }}" class="dropdown-item">
                                               Deuda Sisa
                                            </a>
                                            <a href="{{ route('puestos.tramites.create', $puesto->id) }}" class="dropdown-item">
                                                Pago Trámite
                                            </a>
                                            <a href="{{ route('puestos.servicios.create', $puesto->id) }}" class="dropdown-item">
                                                Pago Servicio
                                            </a>
                                            <a href="{{ route('servicio.deuda', $puesto->id) }}" class="dropdown-item">
                                                Deuda Servicio
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal"># Recibo</label>

                                <div class="col-md-6">
                                    <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ mt_rand(0, 9999999999) }}" readonly autocomplete="num_recibo" autofocus>

                                    @error('num_recibo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Obtine el ID --}}
                            <div class="form-group row d-none">

                                <div class="col-md-6">
                                    <input id="tipo_id" type="text" class="form-control @error('tipo_id') is-invalid @enderror" name="tipo_id" value="1" readonly autocomplete="tipo_id" autofocus>

                                    @error('tipo_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar Pago
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-secondary text-white">
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
