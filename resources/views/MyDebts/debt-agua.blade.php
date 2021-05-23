@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin', 'cobrador', 'comerciante']))
            <div class="">
                <div class="accordion" id="accordionExample">
                    <div class="card-header" >
                        <div class="btn btn-info text-left d-inline"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                        >
                            <span id="headingOne">
                                <a class="text-white font-weight-bold" href="{{ route('my-debts') }}">
                                    Mis Deudas Sisa
                                </a>
                            </span>
                        </div>

                        <div class="btn btn-info d-inline ml-1"
                            data-toggle="collapse"
                            data-target="#collapseTwo"
                            aria-expanded="true"
                            aria-controls="collapseTwo"
                        >
                            <span id="headingTwo" class="font-weight-bold">
                                Mis Deudas Agua
                            </span>
                        </div>
                    </div>


                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-6 m-auto">
                                <li class="list-group mt-3">
                                  <li class="list-group-item list-group-item-action bg-info d-flex justify-content-between">
                                    <span class="font-weight-bold">Listado Deuda Agua</span>
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

