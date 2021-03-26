@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
        <div class="container">

            @include('partials.search-header', [
                    'title' => 'Conductores',
                    'linkCreate' => 'users.create',
                    'titleCreate' => 'Crear Conductor',
                    'linkAction' => 'conductores.search'
                ])

            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Conductor</th>
                        <th scope="col">DNI</th>
                        <th scope="col">N. Puesto</th>
                        <th scope="col">R. Exposición</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($conductores as $puesto)
                        <tr>
                            <td>{{ $puesto->name }} {{ $puesto->apellido }}</td>
                            <td>{{ $puesto->dni }}</td>
                            <td>{{ $puesto->num_puesto }}</td>
                            <td>{{ $puesto->riesgo_exposicion }}</td>
                            <td>{{ $puesto->ubicacion }}</td>
                            <td>{{ $puesto->actividad }}</td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('puestos.show', $puesto->id) }}" data-toggle="tooltip" data-placement="top" title="Ver más" class="text-warning mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25"      height="25" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
                                            <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547zM14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                                        </svg>
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
@endsection
