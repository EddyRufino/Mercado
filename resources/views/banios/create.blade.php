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
                        <form method="POST" action="{{ route('banios.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right font-weight-normal"
                                    for="num_correlativo"
                                >
                                    N. Correlativo
                                </label>

                                <div class="col-md-6">
                                    <input class="form-control @error('num_correlativo') is-invalid @enderror"
                                        value="{{ $tazaInicio == $tazaFin ? 0 : $tazaInicio + 1 }}"
                                        autocomplete="num_correlativo"
                                        name="num_correlativo"
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
                                <label class="col-md-4 col-form-label text-md-right font-weight-normal"
                                    for="fecha"
                                >
                                    Fecha
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

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right font-weight-normal text-dark"
                                    for="tipo_id"
                                >
                                    Tipo Servicio
                                </label>

                                <div class="col-md-6">

                                    <div class="dropdown">
                                        <button class="btn-s btn-select dropdown-toggle w-100"
                                            data-toggle="dropdown"
                                            aria-expanded="false"
                                            aria-haspopup="true"
                                            id="dropdownMenu2"
                                        >
                                            Taza
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('banio.ducha.create') }}" class="dropdown-item">
                                               Ducha
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Tipo Servicio --}}
                            <input type="hidden" name="tipo_servicio" value="1">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right font-weight-normal">
                                    Monto Taza
                                </label>

                                <div class="col-md-6">
                                    <input id="monto_taza" type="text" class="form-control @error('monto_taza') is-invalid @enderror" name="monto_taza" value="0.50" required autocomplete="monto_taza" autofocus readonly>

                                    @error('monto_taza')
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

{{-- @push('scripts')


    <script type="text/javascript">

        document.getElementById("ducha").style.display = "none";

        function mostrarTaza() {
            document.getElementById("taza").style.display = "flex";
            document.getElementById("ducha").style.display = "none";
            document.getElementById("monto_taza").value = '0.50';
            document.getElementById("monto_ducha").value = '';
        }

        function mostrarDucha() {
            document.getElementById("ducha").style.display = "flex";
            document.getElementById("taza").style.display = "none";
            document.getElementById("monto_ducha").value = 1;
            document.getElementById("monto_taza").value = '';
        }
    </script>
@endpush --}}
