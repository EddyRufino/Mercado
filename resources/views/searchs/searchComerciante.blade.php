@extends('admin.layout')

@section('content')
    <div class="container">
        @include('partials.search', [
            'title' => 'Buscar Conductor',
            'placeholder' => 'Buscar por apellido',
            'link' => 'comerciante.search'
        ])

        <div class="row justify-content-center">
            <div class="col-md-6">
                @forelse ($conductores as $conductor)
                    <div class="card mt-1">
                        @include('partials.card-header', [
                            'title' => 'Resultados',
                            'link' => 'home'
                        ])

                        <div class="card-body">
                            <span class="text-secondary font-weight-bold">
                            {{ $conductor->user->name }} {{ $conductor->user->apellido }} <strong>-</strong>
                            Puesto {{ $conductor->lists->pluck('num_puesto')->implode(', ') }}</span> <br>
                            <span class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $conductor->ubicacion->nombre }}
                            </span>

                            <div class="mt-3">
                                @auth
                                    @if (auth()->user()->hasRoles(['admin', 'cobrador', 'secretaria']))
                                        <a href="{{ route('puestos.pagos.create', $conductor->id) }}" class="btn btn-primary text-white btn-sm">
                                            Pagar
                                        </a>
                                        <a href="{{ route('puestos.deudas.index', $conductor->id) }}" class="btn btn-secondary text-white btn-sm">
                                            Ver Deudas
                                        </a>
                                    @endif
                                @endauth

                               {{--  <a href="{{ route('puestos.deudas.create', $conductor->id) }}" class="btn btn-danger text-white btn-sm">
                                    Deuda
                                </a> --}}

{{--                                 @if ($conductor->user_id === auth()->user()->id)
                                    <a href="{{ route('puestos.deudas.index', $conductor->id) }}" class="btn btn-secondary text-white btn-sm">
                                        Ver Deudas
                                    </a>
                                @endif --}}

                                {{-- @if (auth()->user()->hasRoles(['admin', 'cobrador'])) --}}

                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No hay datos</p>
                @endforelse

            </div>
        </div>
    </div>
@endsection
