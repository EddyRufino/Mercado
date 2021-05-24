@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin', 'banio', 'secretaria']))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="d-flex justify-content-around align-items-center mt-3">
                        <h4 class="text-secondary text-center font-weight-bold mt-1">Tickets</h4>
                        <a class="btn btn-info font-weight-bold btn-sm" href="{{ route('banios.create') }}">
                            Crear Ticket
                        </a>
                    </div>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">N. Correlativo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->num_correlativo }}</td>
                                    <td>{{ $ticket->fecha }}</td>

                                    @if ($ticket->tipo_servicio == 1)
                                        <td>Taza</td>
                                        <td>S/. {{ $ticket->monto_taza }}</td>
                                    @else
                                        <td>Ducha</td>
                                        <td>S/. {{ $ticket->monto_ducha }}</td>
                                    @endif


                                    <td>
                                        @if (auth()->user()->hasRoles(['admin', 'banio', 'secretaria']))
                                        <div class="d-flex">
                                            <a href="{{ route('banios.edit', $ticket) }}"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Editar"
                                                class="text-warning mr-2"
                                            >
                                                @include('icons.icon-edit')
                                            </a>

                                        @endif

                                        @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                                        <form method="POST" action="{{ route('banios.destroy', $ticket) }}"
                                                style="display: inline;"
                                        >
                                                {{ csrf_field() }} {{ method_field('DELETE') }}

                                            <button class="btn btn-xs btn-link p-0 m-0"
                                                onclick="return confirm('¿Estás seguro de eliminarlo?')"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Eliminar"
                                            >

                                                @include('icons.icon-delete')

                                            </button>
                                        </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <li class="list-group-item border-0 mb-3 shadow-sm">No hay nada para mostrar</li>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="overflow-auto mt-2">
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>

        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
