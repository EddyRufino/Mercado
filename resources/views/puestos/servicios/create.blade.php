@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-3">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <span class="w-100 font-weight-bold">
                            {{ $puesto->user->name }} {{ $puesto->user->apellido }} <strong>-</strong> Puesto {{ $puesto->lists->pluck('num_puesto')->implode(',  ') }}
                        </span>
                    </div>
                    <div class="card-body">
                        <form id="myform" method="POST" action="{{ route('puestos.servicios.store', $puesto) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">N. Recibo</label>

                                <div class="col-md-6">
                                    <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}" autocomplete="num_recibo" readonly>

                                    @error('num_recibo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Fecha</label>

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

                            <div class="form-group row">
                                <label for="monto_agua" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">M. Agua</label>

                                <div class="col-md-6">
                                    <input id="monto_agua" type="number" step="any" class="form-control @error('monto_agua') is-invalid @enderror" name="monto_agua" value="{{ old('monto_agua') }}"autocomplete="monto_agua" required autofocus>

                                    @error('monto_agua')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo_id" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Tipo Pago</label>

                                <div class="col-md-6">

                                    <div class="dropdown">
                                        <button class="btn-s btn-select dropdown-toggle w-100" id="dropdownMenu2"    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pago Agua
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{ route('puestos.pagos.create', $puesto->id) }}" class="dropdown-item">
                                                Pago Sisa
                                            </a>
                                            <a href="{{ route('puestos.deudas.create', $puesto->id) }}" class="dropdown-item">
                                                Deuda Sisa
                                            </a>
                                            <a href="{{ route('puestos.tramites.create', $puesto->id) }}" class="dropdown-item">
                                                Pago Trámites
                                            </a>
                                            <a href="{{ route('servicio.deuda', $puesto->id) }}" class="dropdown-item">
                                                Deuda Agua
                                            </a>
                                            <a href="{{ route('puestos.pagoanticipados.create', $puesto->id) }}" class="dropdown-item">
                                               Sisa Anticipada
                                            </a>
                                            <a href="{{ route('puestos.aguaanticipados.create', $puesto->id) }}" class="dropdown-item">
                                               Agua Anticipada
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-none">

                                <div class="col-md-6">
                                    <input id="tipo_id" type="text" class="form-control @error('tipo_id') is-invalid @enderror" name="tipo_id" value="4" readonly autocomplete="tipo_id" autofocus>

                                    @error('tipo_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 mt-2">
                                    <button type="submit" class="btn btn-primary" onclick="mostrar(event)">
                                        Guardar Pago
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function mostrar() {
        event.preventDefault();
        Swal.fire({
          title: "Estás segur@?",
          text: "Recuerda estar completamente segur@!",
          showDenyButton: true,  showCancelButton: false,
          confirmButtonText: `Sí`,
          denyButtonText: `Salir`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                document.getElementById("myform").submit();
            } else if (result.isDenied) {
                Swal.fire('Los cambios no se guardaron', '', 'info')
            }
        });

    }
</script>
@endpush
