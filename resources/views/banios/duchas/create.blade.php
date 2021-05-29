@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Nuevo Ticket',
                        'link' => 'banios.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('banio.ducha.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="num_correlativo" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Correlativo</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('num_correlativo') is-invalid @enderror"
                                        name="num_correlativo"
                                        value="{{ $duchaInicio == $duchaFin ? 0 : $duchaInicio + 1 }}"
                                        autocomplete="num_correlativo"
                                        id="num_correlativo"
                                        type="number"
                                        autofocus
                                        required
                                        readonly
                                    >

                                    @error('num_correlativo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input type="date" id="start" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                                           value="<?php echo date("Y-m-d"); ?>"
                                           min="2018-01-01" max="2030-12-31" required>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tipo Servicio --}}
                            <input type="hidden" name="tipo_servicio" value="2">

                            <div class="form-group row">
                                <label for="tipo_id" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Tipo Servicio</label>

                                <div class="col-md-6">

                                    <div class="dropdown">
                                        <button class="btn-s btn-select dropdown-toggle w-100" id="dropdownMenu2"    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ducha
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('banios.create') }}" class="dropdown-item">
                                               Taza
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right font-weight-normal">
                                    Monto Ducha
                                </label>

                                <div class="col-md-6">
                                    <input id="monto_ducha" type="text" class="form-control @error('monto_ducha') is-invalid @enderror" name="monto_ducha" value="1" required autocomplete="monto_ducha" autofocus readonly>

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

