@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin', 'cobrador', 'secretaria']))
            <div class="container">

                @include('partials.search-header', [
                        'title' => 'Conductores',
                        'linkCreate' => 'users.create',
                        'linkPDF' => 'conductores.pdf',
                        'linkEXCEL' => 'conductores.excel',
                        'linkAction' => 'conductores.search'
                    ])

                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Conductor</th>
                            <th scope="col">DNI</th>
                            <th scope="col">N. Puesto</th>
                            <th scope="col">R. Exposición</th>
                            <th scope="col">Actividad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($conductores as $puesto)
                            <tr>
                                <td>{{ $puesto->user->name }} {{ $puesto->user->apellido }}</td>
                                <td>{{ $puesto->user->dni }}</td>
                                <td>{{ $puesto->num_puesto }}</td>
                                <td>{{ $puesto->riesgo_exposicion }}</td>
                                <td>{{ $puesto->actividad->nombre }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('puestos.show', $puesto->id) }}" data-toggle="tooltip" data-placement="top" title="Ver más" class="text-warning mr-2">
                                            @include('icons.icon-show')
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <li class="list-group-item border-0 mb-3 shadow-sm">No hay nada para mostrar</li>
                        @endforelse
                    </tbody>
                </table>

                <div class="overflow-auto mt-2">
                    {{ $conductores->links() }}
                </div>
            </div>
        @else
            <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
        @endif
    </div>
@endsection
