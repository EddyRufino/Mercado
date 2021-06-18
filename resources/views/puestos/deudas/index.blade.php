@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin', 'cobrador', 'secretaria']))
            <div class="">
                <div class="accordion" id="accordionExample">
                    <div class="card-header" >
                        <div class="btn btn-info text-left d-inline"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                        >
                            <span id="headingOne" class="font-weight-bold">Deuda Sisa</span>
                        </div>

                        <div class="btn btn-info d-inline"
                            data-toggle="collapse"
                            data-target="#collapseTwo"
                            aria-expanded="true"
                            aria-controls="collapseTwo"
                        >
                            <span id="headingTwo" class="font-weight-bold">Deuda Agua</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-2">
                        <form id="myform" action="{{ route('deuda.personal') }}" class="form-inline">
                            @csrf
                            <input type="hidden" name="puesto_id" value="{{ $puesto->id }}">
                            <div class="input-group input-group-md">
                                <select name="tipo" class="form-control">
                                    <option value="1">Deuda Sisa</option>
                                    <option value="2">Deuda Agua</option>
                                </select>
                                <input type="date" id="start" name="dateStart" class="form-control"
                                    value="<?php echo date("Y-m-d"); ?>"
                                    min="2018-01-01" max="2030-12-31"
                                    required
                                >

                                <input type="date" id="last" name="dateLast" class="form-control"
                                    value="<?php echo date("Y-m-d"); ?>"
                                    min="2018-01-01" max="2030-12-31"
                                    required
                                >

                                <input id="num_recibo" type="hidden" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}" required autocomplete="num_recibo" autofocus readonly>

                                <div class="input-group-append">
                                  <button class="btn btn-navbar bg-primary" type="submit" onclick="mostrarAll(event)">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                          </div>
                        </form>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-8 m-auto">
                            <p class="">El número correlativo que sigue es:
                                <strong>{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}</strong>
                            </p>
                                <li class="list-group">
                                  <li class="list-group-item list-group-item-action bg-info d-flex justify-content-between">
                                    <span class="font-weight-bold">Listado Deuda Sisa</span>
                                @if ($deudas->count() >= 1 )
                                    <div>
                                        <a class="text-white mr-1 font-weight-bold"
                                            href="{{ route('deudas.pdf', $deudas->pluck('puesto_id')->first()) }}"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Exportar PDF"
                                        >
                                            PDF
                                        </a>
                                        <a class="text-white font-weight-bold"
                                            href="{{ route('deudas.excel', $deudas->pluck('puesto_id')->first()) }}"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Exportar EXCEL"
                                        >
                                            EXCEL
                                        </a>
                                    </div>
                                @endif

                                  </li>

                                @forelse ($deudas as $deuda)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="text-secondary font-weight-bold" style="font-size: 1.1rem">
                                                    {{ $deuda->puesto->user->name }} {{ $deuda->puesto->user->apellido }}
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                                                <span class="text-secondary">
                                                    @include('icons.icon-home')
                                                    Puesto {{ $deuda->puesto->lists->pluck('num_puesto')->implode(',  ') }}
                                                </span>
                                                <span class="text-secondary">
                                                    @include('icons.icon-date')
                                                    {{ $deuda->fecha }}
                                                </span>

                                            </div>

                                            <div class="col-sm-12 col-md-5 d-flex justify-content-around">
                                                <span class="text-secondary">S/. {{ $deuda->monto_sisa }}</span>



                                              @auth
                                                @if (auth()->user()->hasRoles(['admin', 'cobrador']))

                                                <form id="myform2" method="POST" action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                                        style="display: inline;">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}

                                                  <input id="num_recibo" type="hidden" class="form-control col-sm-2
                                                  col-md-2" name="num_recibo" value="{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}" required readonly>

                                                  <button class="btn btn-xs btn-link p-0 m-0"
                                                    onclick="return confirm('¿Estás seguro del pago?')"
                                                    data-toggle="tooltip" data-placement="top" title="Pagar Deuda">

                                                    @include('icons.icon-pay')

                                                  </button>
                                                </form>

                                                @endif
                                              @endauth
{{--                         <button type="button" class="btn btn-primary btn-sm" >
                            Open
                        </button> --}}
{{--                                     <button class="btn btn-xs btn-link p-0 m-0"
                                        title="Pagar Deuda"
                                        onclick="javascript:showModal();"
                                    >

                                        @include('icons.icon-pay')

                                    </button>


                                    <div id="openModal" class="modalDialog">
                                        <div class="p-4 col-sm-10 col-md-6">

                                            <div class="">
                                                <h4 class="font-weight-bold text-secondary">N. Correlativo - Pagar deuda sisa</h4>
                                            </div>
                                            <hr>

                                            <form action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                                    method="POST"
                                                    style="display: inline;"
                                                >
                                                    @csrf @method('DELETE')

                                                <div class="form-group row mt-4">
                                                    <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">N. Recibo</label>

                                                    <div class="col-md-6">
                                                        <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}" required autocomplete="num_recibo" autofocus readonly>

                                                        @error('num_recibo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-4 mt-2 d-flex">
                                                        <button type="submit"
                                                            class="btn btn-primary"
                                                            onclick="return confirm('¿Estás seguro del pago?')"
                                                        >
                                                            Guardar Pago
                                                        </button>
                                                        <a href="#"
                                                            class="btn btn-light text-dark ml-2"
                                                            onclick="javascript:CloseModal();">
                                                            Cancelar
                                                        </a>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>
                                    </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <li class="list-group-item border-0 mb-3 shadow-sm">No hay deudas para mostrar</li>
                                @endforelse

                                <div class="overflow-auto mt-1">
                                    {{ $deudas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-8 m-auto">
                            <p class="">El número correlativo que sigue es:
                                <strong>{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}</strong>
                            </p>
                                <li class="list-group mt-3">
                                  <li class="list-group-item list-group-item-action bg-info d-flex justify-content-between">
                                    <span class="font-weight-bold">Listado Deuda Agua</span>
                                @if ($deudas->count() >= 1 )
                                    <div>
                                        <a class="text-white mr-1 font-weight-bold"
                                            href="{{ route('deudas.pdf', $deudas->pluck('puesto_id')->first()) }}"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Exportar PDF"
                                        >
                                            PDF
                                        </a>
                                        <a class="text-white font-weight-bold"
                                            href="{{ route('deudas.excel', $deudas->pluck('puesto_id')->first()) }}"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Exportar EXCEL"
                                        >
                                            EXCEL
                                        </a>
                                    </div>
                                @endif

                                  </li>

                                @forelse ($aguaDeudas as $deuda)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="text-secondary font-weight-bold" style="font-size: 1.1rem">
                                                    {{ $deuda->puesto->user->name }} {{ $deuda->puesto->user->apellido }}
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                                                <span class="text-secondary">
                                                    @include('icons.icon-home')
                                                    Puesto {{ $deuda->puesto->lists->pluck('num_puesto')->implode(',  ') }}
                                                </span>
                                                <span class="text-secondary">
                                                    @include('icons.icon-date')
                                                    {{ $deuda->fecha }}
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-5 d-flex justify-content-around">
                                                <span class="text-secondary">
                                                    S/. {{ $deuda->monto_agua }}
                                                </span>


{{--                                     <button class="btn btn-xs btn-link p-0 m-0"
                                        title="Pagar Deuda"
                                        onclick="javascript:showModalAgua();"
                                    >

                                        @include('icons.icon-pay')

                                    </button>

                                    <div id="openModalAgua" class="modalDialog">
                                        <div class="p-4 col-sm-10 col-md-6">

                                            <div class="">
                                                <h4 class="font-weight-bold text-secondary">N. Correlativo - Pagar deuda agua</h4>
                                            </div>
                                            <hr>

                                            <form action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                                    method="POST"
                                                    style="display: inline;"
                                                >
                                                    @csrf @method('DELETE')

                                                <div class="form-group row mt-4">
                                                    <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">N. Recibo</label>

                                                    <div class="col-md-6">
                                                        <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}" required autocomplete="num_recibo" autofocus readonly>

                                                        @error('num_recibo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-4 mt-2 d-flex">
                                                        <button type="submit"
                                                            class="btn btn-primary"
                                                            onclick="return confirm('¿Estás seguro del pago?')"
                                                        >
                                                            Guardar Pago
                                                        </button>
                                                        <a href="#" class="btn btn-light text-dark ml-2" onclick="javascript:CloseModalAgua();">
                                                            Cancelar
                                                        </a>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>
                                    </div> --}}



                                              @auth
                                                @if (auth()->user()->hasRoles(['admin', 'cobrador']))

                                                <form action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                                        method="POST"
                                                        style="display: inline;"
                                                    >
                                                        @csrf @method('DELETE')

                                                    <input id="num_recibo" type="hidden" class="form-control col-sm-2 col-md-2" name="num_recibo" value="{{ $tazaInicio == $tazaFin ? 'Actualiza Talonario' : $tazaInicio + 1 }}" required readonly>

                                                    <button class="btn btn-xs btn-link p-0 m-0"
                                                    onclick="return confirm('¿Estás seguro del pago?')" data-toggle="tooltip" data-placement="top" title="Pagar Deuda">

                                                        @include('icons.icon-pay')

                                                    </button>
                                                </form>

                                                @endif
                                              @endauth
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <li class="list-group-item border-0 mb-3 shadow-sm">No hay deudas para mostrar</li>
                                @endforelse

                                <div class="overflow-auto mt-1">
                                    {{ $aguaDeudas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        @else
            <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
        @endif
            </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Pagar muchos --}}
<script type="text/javascript">
    function mostrarAll() {
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

{{-- Pagar por 1 sisa --}}
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
                document.getElementById("myform2").submit();
            } else if (result.isDenied) {
                Swal.fire('Los cambios no se guardaron', '', 'info')
            }
        });

    }
</script>

{{-- Pagar por 1 agua --}}
<script type="text/javascript">
    function mostrarOneAgua() {
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
                document.getElementById("myform3").submit();
            } else if (result.isDenied) {
                Swal.fire('Los cambios no se guardaron', '', 'info')
            }
        });

    }
</script>

    <script>
        function showModal() {
          document.getElementById('openModal').style.display = 'block';
        }

        function CloseModal() {
          document.getElementById('openModal').style.display = 'none';
        }
    </script>

    <script>
        function showModalAgua() {
          document.getElementById('openModalAgua').style.display = 'block';
        }

        function CloseModalAgua() {
          document.getElementById('openModalAgua').style.display = 'none';
        }
    </script>
@endpush

@push('styles')
  <style>
    .content-modal {

    }
    .modalDialog {
      position: fixed;
      font-family: Arial, Helvetica, sans-serif;
      top: 15px;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(0,0,0,0.5);
      z-index: 5;
      display:none;
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 400ms ease-in;
      pointer-events: auto;
    }
    .modalDialog > div {
      width: 100%;
      position: relative;
      margin: 10% auto;
      padding: 5px 20px 13px 20px;
      border-radius: 10px;
      background: #fff;
      -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    }
    .close {
      background: #606061;
      color: #FFFFFF;
      line-height: 25px;
      position: absolute;
      right: -12px;
      text-align: center;
      top: -10px;
      width: 24px;
      text-decoration: none;
      font-weight: bold;
      -webkit-border-radius: 12px;
      -moz-border-radius: 12px;
      border-radius: 12px;
      -moz-box-shadow: 1px 1px 3px #000;
      -webkit-box-shadow: 1px 1px 3px #000;
      box-shadow: 1px 1px 3px #000;
    }
    .close:hover { background: #00d9ff; }
  </style>
@endpush
