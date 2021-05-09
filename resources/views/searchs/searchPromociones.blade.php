@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @include('partials.search-header', [
                            'title' => 'Promociones',
                            'linkCreate' => 'promociones.create',
                            'linkPDF' => 'promociones.pdf',
                            'linkEXCEL' => 'promociones.excel',
                            'linkAction' => 'promociones.search'
                        ])

                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Nombre Empresa</th>
                                <th scope="col">Monto Pago</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($promociones as $promocion)
                                <tr>
                                    <td>{{ $promocion->nombre_empresa }}</td>
                                    <td>S/. {{ $promocion->monto }}</td>
                                    <td>{{ $promocion->fecha_inicio }}</td>
                                    <td>{{ $promocion->fecha_fin }}</td>
                                    <td>{{ $promocion->telefono }}</td>
                                    <td>
                                        <div class="d-flex">
{{--                                             <a href="{{ route('promociones.edit', $promocion->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">
                                                @include('icons.icon-edit')
                                            </a> --}}

                                        @auth
                                            @if (auth()->user()->hasRoles(['admin']))
                                                <form method="POST" action="{{ route('promociones.destroy', $promocion->id) }}"
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
                        {{ $promociones->links() }}
                    </div>
                </div>
            </div>

        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
