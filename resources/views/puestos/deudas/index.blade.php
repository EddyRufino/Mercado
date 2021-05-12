@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin', 'cobrador', 'comerciante']))
            <div class="">
                <div class="accordion" id="accordionExample">
                    <div class="card-header" >
                        <div class="btn btn-primary text-left d-inline" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <span id="headingOne">Deuda Sisa</span>
                        </div>
                        <div class="btn btn-primary d-inline" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          <span id="headingTwo">Deuda Agua</span>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-6 m-auto">
                                <li class="list-group mt-3">
                                  <li class="list-group-item list-group-item-action bg-secondary d-flex justify-content-between">
                                    <span>Listado Deuda Sisa</span>
                                @if ($deudas->count() >= 1 )
                                    <div>
                                        <a href="{{ route('deudas.pdf', $deudas->pluck('puesto_id')->first()) }}" class="text-white mr-1" data-toggle="tooltip" data-placement="top" title="Exportar PDF">
                                            PDF
                                        </a>
                                        <a href="{{ route('deudas.excel', $deudas->pluck('puesto_id')->first()) }}" class="text-white"
                                        data-toggle="tooltip" data-placement="top" title="Exportar EXCEL">
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

                                                <form method="POST" action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                                        style="display: inline;">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}
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
                                    {{ $deudas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-6 m-auto">
                                <li class="list-group mt-3">
                                  <li class="list-group-item list-group-item-action bg-secondary d-flex justify-content-between">
                                    <span>Listado Deuda Agua</span>
                                @if ($deudas->count() >= 1 )
                                    <div>
                                        <a href="{{ route('deudas.pdf', $deudas->pluck('puesto_id')->first()) }}" class="text-white mr-1" data-toggle="tooltip" data-placement="top" title="Exportar PDF">
                                            PDF
                                        </a>
                                        <a href="{{ route('deudas.excel', $deudas->pluck('puesto_id')->first()) }}" class="text-white"
                                        data-toggle="tooltip" data-placement="top" title="Exportar EXCEL">
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

                                              @auth
                                                @if (auth()->user()->hasRoles(['admin', 'cobrador']))

                                                <form method="POST" action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                                        style="display: inline;">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}

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

