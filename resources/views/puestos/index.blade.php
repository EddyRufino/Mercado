@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
        <div class="container">

            @include('partials.search-header', [
                    'title' => 'Puestos',
                    'linkCreate' => 'puestos.create',
                    'linkPDF' => 'home',
                    'linkEXCEL' => 'home',
                    'linkAction' => 'puestos.search'
                ])

            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Conductor</th>
                        <th scope="col">N. Puesto</th>
                        <th scope="col">C. Puesto</th>
                        <th scope="col">Medidas</th>
                        <th scope="col">Sisa Puesto</th>
                        <th scope="col">Sisa Diaria</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->user->name }} {{ $puesto->user->apellido }}</td>
                            <td>{{ $puesto->num_puesto }}</td>
                            <td>{{ $puesto->cantidad_puesto }}</td>
                            <td>{{ $puesto->medidas }}</td>
                            <td>S/. {{ $puesto->sisa }}</td>
                            <td>S/. {{ $puesto->sisa_diaria }}</td>
                            <td>{{ $puesto->ubicacion->nombre }}</td>
                            <td>{{ $puesto->actividad->nombre }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('puestos.edit', $puesto->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">
                                        @include('icons.icon-edit')
                                    </a>

                                @auth
                                    @if (auth()->user()->hasRoles(['admin']))
                                        <form method="POST" action="{{ route('puestos.destroy', $puesto) }}"
                                                style="display: inline;">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-link p-0 m-0"
                                              onclick="return confirm('¿Estás seguro de eliminarlo?')" data-toggle="tooltip" data-placement="top" title="Eliminar">

                                              @include('icons.icon-delete')

                                            </button>
                                        </form>
                                    @endif
                                @endauth
                                </div>
                            </td>
                        </tr>
                    @empty
                        <li class="list-group-item border-0 mb-3 shadow-sm">No hay nada para mostrar</li>
                    @endforelse
                </tbody>
            </table>

            <div class="overflow-auto mt-2">
                {{ $puestos->links() }}
            </div>
        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
