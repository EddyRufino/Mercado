@extends('admin.layout')

@section('content')
    @if (auth()->user()->hasRoles(['admin', 'banio', 'secretaria']))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h4 class="text-secondary text-center font-weight-bold mt-2 ">Tickets</h4>
                        <a class="btn btn-info font-weight-bold btn-sm" href="{{ route('banios.create') }}">
                            Crear Ticket
                        </a>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <form action="{{ route('banio.search') }}" class="form-inline">
                            @csrf
                          <div class="input-group input-group-md">
                            <select name="tipo_servicio" class="form-control">
                                <option value="1">Taza</option>
                                <option value="2">Ducha</option>
                            </select>
                            <select name="day" class="form-control">
                                <option>Día</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="22">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select name="month" class="form-control">
                                <option>Mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <select name="year" class="form-control">
                                <option>Año</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2029">2030</option>
                            </select>

                            <div class="input-group-append">
                              <button class="btn btn-navbar bg-primary" type="submit">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
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

                    <div class="overflow-auto">
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>

        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif
@endsection
