@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin']))
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="list-group mt-3">
                      <button type="button" class="list-group-item list-group-item-action bg-secondary d-flex justify-content-between">
                        <span>Listado de Deudas</span>

                        @if ($deudas->count() >= 30 )
                            <span>Días sin pagar: <strong  class="text-danger">{{ $deudas->count() }}</strong>
                            </span>
                        @else
                            <span>Días sin pagar: <strong>{{ $deudas->count() }}</strong>
                            </span>
                        @endif
                      </button>

                      @forelse ($deudas as $deuda)
                          <div class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-secondary" style="font-size: 1.1rem">
                                        {{ $deuda->puesto->user->name }} {{ $deuda->puesto->user->apellido }}
                                    </span>
                                </div>
                                <div class="col-sm-12 col-md-6 d-flex justify-content-between">
                                    <span class="text-secondary">Puesto {{ $deuda->puesto->num_puesto }}</span>
                                    <span class="text-secondary">
                                        {{ $deuda->fecha }}
                                    </span>
                                </div>
                                <div class="col-sm-12 col-md-6 d-flex justify-content-around">
                                    <span class="text-secondary">S/. {{ $deuda->monto_sisa }}</span>

                                  @auth
                                    @if (auth()->user()->hasRoles(['admin']))

                                    <form method="POST" action="{{ route('puestos.deudas.destroy', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}"
                                            style="display: inline;">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                      <button class="btn btn-xs btn-link p-0 m-0"
                                        onclick="return confirm('¿Estás seguro del pago?')" data-toggle="tooltip" data-placement="top" title="Pagar Deuda">
                                        <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="text-warning " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                      </button>
                                    </form>

                                    @endif
                                  @endauth
{{--                                     <a href="{{ route('puestos.deudas.edit', ['puesto' => $deuda->puesto->id, 'deuda' => $deuda->id]) }}" data-toggle="tooltip" data-placement="top" title="Pagar Deuda" class="text-warning mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                                            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                    </a> --}}
                                </div>
                            </div>
                          </div>
                    </div>
                    @empty
                        <li class="list-group-item border-0 mb-3 shadow-sm">No hay deudas para mostrar</li>
                    @endforelse

                    <div class="overflow-auto mt-2">
                        {{ $deudas->links() }}
                    </div>
                </div>
        @else
            <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
        @endif
            </div>
    </div>
@endsection

