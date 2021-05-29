@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin', 'secretaria', 'cobrador']))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="d-flex justify-content-around align-items-center mt-3">
                        <h4 class="text-secondary text-center font-weight-bold mt-1">Número De Talonario</h4>
                        <a class="btn btn-info font-weight-bold btn-sm" href="{{ route('talonarios.create') }}">Crear Talonario</a>
                    </div>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">N. Inicio</th>
                                <th scope="col">N. Fin</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($talonarios as $talonario)
                                <tr>
                                    <td>{{ $talonario->num_inicio }}</td>
                                    <td>{{ $talonario->num_fin }}</td>
                                    @if ($talonario->num_inicio_correlativo == $talonario->num_fin)
                                        <td><span class="bg-danger rounded p-1">Terminado</span></td>
                                    @else
                                        <td><span class="bg-success rounded p-1">Corriendo</span></td>
                                    @endif

                                    @if ($talonario->tipo == 1)
                                        <td>Sisa</td>
                                    @endif

                                    @if ($talonario->tipo == 2)
                                        <td>Taza - Baño</td>
                                    @endif

                                    @if ($talonario->tipo == 3)
                                        <td>Ducha - Baño</td>
                                    @endif

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('talonarios.edit', $talonario->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">
                                                @include('icons.icon-edit')
                                            </a>

                                        @auth
                                            @if (auth()->user()->hasRoles(['admin']))
                                                <form method="POST" action="{{ route('talonarios.destroy', $talonario) }}"
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
                        {{ $talonarios->links() }}
                    </div>
                </div>
            </div>

        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
