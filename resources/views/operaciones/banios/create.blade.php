@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-3">
                @include('partials.card-header', [
                    'title' => 'N. Operacón Baño',
                    'link' => 'operacion.banio.create'
                ])
                <div class="card-body">
                    <form method="POST" action="{{ route('operacion.banio.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Pagos</label>

                            <div class="col-md-6">
                                <select class="form-control selectpicker" name="fecha" required data-live-search="true">
                                    @foreach ($banios as $banio)
                                        <option class="" value="{{ $banio->fecha }}">
                                            {{ ($banio->fecha) }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_operacion" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Operación</label>

                            <div class="col-md-6">
                                <input id="num_operacion" type="text" class="form-control @error('num_operacion') is-invalid @enderror" name="num_operacion" value="{{ old('num_operacion') }}" required autocomplete="num_operacion" autofocus>

                                @error('num_operacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto_deposito" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Deposito</label>

                            <div class="col-md-6">
                                <input id="monto_deposito" type="text" class="form-control @error('monto_deposito') is-invalid @enderror" name="monto_deposito" value="{{ old('monto_deposito') }}" required autocomplete="monto_deposito" autofocus>

                                @error('monto_deposito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_deposito" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Deposito</label>

                            <div class="col-md-6">
                                <input type="date" id="start" name="fecha_deposito" class="form-control @error('fecha_deposito') is-invalid @enderror" value="<?php echo date("Y-m-d"); ?>" min="2018-01-01" max="2030-12-31" required >

                                @error('fecha_deposito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
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
