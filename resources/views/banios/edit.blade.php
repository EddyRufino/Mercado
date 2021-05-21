@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Ticket',
                        'link' => 'banios.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('banios.update', $ticket) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="num_correlativo" class="col-md-4 col-form-label text-md-right font-weight-normal">N.</label>

                                <div class="col-md-6">
                                    <input id="num_correlativo" type="number" class="form-control @error('num_correlativo') is-invalid @enderror" name="num_correlativo" value="{{ old('num_correlativo', $ticket->num_correlativo) }}" required autocomplete="num_correlativo" autofocus>

                                    @error('num_correlativo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input type="date" id="start" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                                           value="{{$ticket->fecha}}"
                                           min="2018-01-01" max="2030-12-31" required>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right font-weight-normal">Servicio</label>
                                @if ($ticket->tipo_servicio === 1)

                                    <div class="col-md-6">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="tipo_servicio" value="1"  onclick="mostrarTaza()" checked>
                                          <label class="form-check-label">
                                            Taza
                                          </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input"  type="radio" name="tipo_servicio" value="2" onclick="mostrarDucha()" >
                                          <label class="form-check-label">
                                            Ducha
                                          </label>
                                        </div>
                                    </div>

                                @else

                                    <div class="col-md-6">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="tipo_servicio" value="1"  onclick="mostrarTaza()">
                                          <label class="form-check-label">
                                            Taza
                                          </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input"  type="radio" name="tipo_servicio" value="2" onclick="mostrarDucha()" checked>
                                          <label class="form-check-label">
                                            Ducha
                                          </label>
                                        </div>
                                    </div>

                                @endif
                            </div>


                            @if ($ticket->tipo_servicio === 1)

                                <div class="form-group row" id="taza">
                                    <label for="monto_taza" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Taza</label>

                                    <div class="col-md-6">
                                        <input id="monto_taza" type="text" class="form-control @error('monto_taza') is-invalid @enderror" name="monto_taza" required autocomplete="monto_taza" autofocus readonly value="1">

                                        @error('monto_taza')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row d-none" id="ducha">
                                    <label for="monto_ducha" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Ducha</label>

                                    <div class="col-md-6">
                                        <input id="monto_ducha" type="text" class="form-control @error('monto_ducha') is-invalid @enderror" name="monto_ducha" required autocomplete="monto_ducha" autofocus readonly value="{{ $ticket->monto_ducha }}">

                                        @error('monto_ducha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            @else

                                <div class="form-group row d-none" id="taza">
                                    <label for="monto_taza" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Taza</label>

                                    <div class="col-md-6">
                                        <input id="monto_taza" type="text" class="form-control @error('monto_taza') is-invalid @enderror" name="monto_taza" required autocomplete="monto_taza" autofocus readonly value="{{ $ticket->monto_taza }}">

                                        @error('monto_taza')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row " id="ducha">
                                    <label for="monto_ducha" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Ducha</label>

                                    <div class="col-md-6">
                                        <input id="monto_ducha" type="text" value="1" class="form-control @error('monto_ducha') is-invalid @enderror" name="monto_ducha" required autocomplete="monto_ducha" autofocus readonly >

                                        @error('monto_ducha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            @endif


                            {{-- // --}}
                                <div class="form-group row" id="tazaUpdate">
                                    <label for="monto_taza" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Taza</label>

                                    <div class="col-md-6">
                                        <input id="monto_taza_update" type="text" class="form-control @error('monto_taza') is-invalid @enderror" name="monto_taza" required autocomplete="monto_taza" autofocus readonly >

                                        @error('monto_taza')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" id="duchaUpdate">
                                    <label for="monto_ducha" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Ducha</label>

                                    <div class="col-md-6">
                                        <input id="monto_ducha_update" type="text" class="form-control @error('monto_ducha') is-invalid @enderror" name="monto_ducha" required autocomplete="monto_ducha" autofocus readonly >

                                        @error('monto_ducha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-secondary text-white">
                                        Cancelar
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">

        document.getElementById("tazaUpdate").style.display = "none";
        document.getElementById("duchaUpdate").style.display = "none";

        function mostrarTaza() {
            // document.getElementById("taza").style.display = "flex";
            document.getElementById("ducha").style.display = "none";
            document.getElementById("duchaUpdate").style.display = "none";
            document.getElementById("tazaUpdate").style.display = "flex";
            document.getElementById("monto_taza_update").value = '0.50';
            document.getElementById("monto_ducha_update").value = '';
        }

        function mostrarDucha() {
            // document.getElementById("ducha").style.display = "flex";
            document.getElementById("taza").style.display = "none";
            document.getElementById("duchaUpdate").style.display = "flex";
            document.getElementById("tazaUpdate").style.display = "none";
            document.getElementById("monto_ducha_update").value = 1;
            document.getElementById("monto_taza_update").value = '';
        }
    </script>
@endpush
