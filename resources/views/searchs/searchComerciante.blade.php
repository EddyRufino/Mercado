@extends('admin.layout')

@section('content')
    <div class="container">
        @include('partials.search', [
            'title' => 'Buscar Conductor',
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
                            {{ $conductor->name }} {{ $conductor->apellido }} <strong>-</strong> Puesto del {{ $conductor->num_puesto }}

                            <div class="mt-3">
                                <a href="{{ route('puestos.pagos.create', $conductor->id) }}" class="btn btn-primary text-white btn-sm">
                                    Pagar
                                </a>
                                <a href="{{ route('puestos.deudas.create', $conductor->id) }}" class="btn btn-danger text-white btn-sm">
                                    Deuda
                                </a>
                                <a href="{{ route('puestos.deudas.index', $conductor->id) }}" class="btn btn-secondary text-white btn-sm">
                                    Ver Deuda
                                </a>
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
