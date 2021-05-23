<div class="card-body">
    <div class="col-md-8 m-auto">
        <li class="list-group mt-3">
          <li class="list-group-item list-group-item-action bg-info d-flex justify-content-between">
            <span class="font-weight-bold">Listado Deuda Sisa</span>
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
                        <span class="text-secondary">
                            S/. {{ $deuda->monto_sisa }}
                        </span>
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
