@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="d-flex justify-content-around align-items-center mt-3">
                        <h4 class="text-secondary text-center font-weight-bold mt-1">Ubicaciones</h4>
                        <a class="btn btn-primary btn-sm" href="{{ route('ubicaciones.create') }}">Crear Ubicación</a>
                    </div>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ubicaciones as $ubicacion)
                                <tr>
                                    <td>{{ $ubicacion->nombre }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('ubicaciones.edit', $ubicacion->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">
                                                @include('icons.icon-edit')
                                            </a>

                                        @auth
                                            @if (auth()->user()->hasRoles(['admin']))
                                                <form method="POST" action="{{ route('ubicaciones.destroy', $ubicacion) }}"
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
                        {{ $ubicaciones->links() }}
                    </div>
                </div>
            </div>

        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
