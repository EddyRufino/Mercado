@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin']))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @include('partials.search-header', [
                            'title' => 'Usuarios',
                            'linkCreate' => 'users.create',
                            'linkPDF' => 'users.pdf',
                            'linkEXCEL' => 'users.excel',
                            'linkAction' => 'users.search'
                        ])
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }} {{ $user->apellido }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">

                                                @include('icons.icon-edit')

                                            </a>

                                        @auth
                                            @if (auth()->user()->hasRoles(['admin']))
                                                <form method="POST" action="{{ route('users.destroy', $user) }}"
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
