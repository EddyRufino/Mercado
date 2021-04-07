@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin']))
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <li class="list-group mt-3">
                      <li class="list-group-item list-group-item-action bg-secondary d-flex justify-content-between">
                        <span>Listado de Deudas</span>
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
                        {{-- @if ($deudas->count() >= 30 )
                            <span>Días sin pagar: <strong  class="text-danger">{{ $deudas->count() }}</strong>
                            </span>
                        @else
                            <span>Días sin pagar: <strong>{{ $deudas->count() }}</strong>
                            </span>
                        @endif --}}
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
                                        Puesto {{ $deuda->puesto->num_puesto }}
                                    </span>
                                    <span class="text-secondary">
                                        @include('icons.icon-date')
                                        {{ $deuda->fecha }}
                                    </span>
                                </div>
                                <div class="col-sm-12 col-md-5 d-flex justify-content-around">
                                    <span class="text-secondary">S/. {{ $deuda->monto_sisa }}</span>

                                  @auth
                                    @if (auth()->user()->hasRoles(['admin']))

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
        @else
            <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
        @endif
            </div>
    </div>
@endsection

