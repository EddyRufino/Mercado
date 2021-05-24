@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Ticket',
                        'link' => 'banios.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('banios.update', $ticket) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="num_correlativo" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Correlativo</label>

                                <div class="col-md-6">
                                    <input id="num_correlativo" type="number" class="form-control @error('num_correlativo') is-invalid @enderror" name="num_correlativo" value="{{ old('num_correlativo', $ticket->num_correlativo) }}" required autocomplete="num_correlativo" autofocus>

                                    @error('num_correlativo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input type="date" id="start" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                                           value="{{$ticket->fecha}}"
                                           min="2018-01-01" max="2030-12-31" required>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo_servicio" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Tipo Servicio</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="tipo_servicio" data-live-search="true">
                                        <option value="1"
                                            {{ old('tipo_servicio', 1) == $ticket->tipo_servicio ? 'selected' : '' }}
                                            >Taza
                                        </option>
                                        <option value="2"
                                            {{ old('tipo_servicio', 2) == $ticket->tipo_servicio ? 'selected' : '' }}
                                            >Ducha
                                        </option>
                                    </select>

                                    @error('tipo_servicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_taza" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Taza</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('monto_taza') is-invalid @enderror" name="monto_taza"  autocomplete="monto_taza" autofocus  value="{{ old('monto_taza', $ticket->monto_taza) }}">

                                    @error('monto_taza')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_ducha" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Ducha</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('monto_ducha') is-invalid @enderror" name="monto_ducha"  autocomplete="monto_ducha" autofocus  value="{{ old('monto_ducha', $ticket->monto_ducha) }}">

                                    @error('monto_ducha')
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

