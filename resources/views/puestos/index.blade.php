@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin']))
            <div class="container">
                <div class="d-flex justify-content-around align-items-center mt-3">
                    <h4 class="text-secondary text-center font-weight-bold">Usuarios</h4>
                    <a class="btn btn-primary btn-sm" href="{{ route('puestos.create') }}">Crear Puesto</a>
                </div>
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">N. Puesto</th>
                            <th scope="col">C.Puesto</th>
                            <th scope="col">Medidas</th>
                            <th scope="col">Sisa</th>
                            <th scope="col">Sisa Total</th>
                            {{-- <th scope="col">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($puestos as $puesto)
                            <tr>
                                <th scope="row">{{ $puesto->id }}</th>
                                <td>{{ $puesto->num_puesto }}</td>
                                <td>{{ $puesto->cantidad_puesto }}</td>
                                <td>{{ $puesto->medidas }}</td>
                                <td>{{ $puesto->sisa }}</td>
                                <td>{{ $puesto->sisa_diaria }}</td>
                                {{-- <td>{{ $user->medidas }}</td> --}}
                               {{--  <td>
                                    <div class="d-flex">
                                        <a href="{{ route('puestos.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">
                                            <svg width=".9em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>

                                    @auth
                                        @if (auth()->user()->hasRoles(['admin']))
                                            <form method="POST" action="{{ route('users.destroy', $user) }}"
                                                    style="display: inline;">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-link p-0 m-0"
                                                  onclick="return confirm('¿Estás seguro de eliminarlo?')" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                  <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-trash text-danger mb-1 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                  </svg>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    </div>
                                </td> --}}
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
    </div>
@endsection
