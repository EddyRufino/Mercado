@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Puesto',
                        'link' => 'puestos.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.update', $puesto->id) }}">
                            @csrf
                            @method('PUT')

                            {{-- @include('forms.formPuestos', ['btn' => 'Editar']) --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Conductor</label>

                                    <div class="col-md-6">
                                        <select class="form-control selectpicker" name="user_id" data-live-search="true">
                                            @foreach ($users as $user)
                                                <option class="" value="{{ $user->id }}"
                                                    {{ old('user_id', $puesto->user_id) == $user->id ? 'selected' : '' }}
                                                    >{{ $user->name }} {{ $user->apellido }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lista_id" class="col-md-4 col-form-label text-md-right font-weight-normal"># Puesto</label>

                                    <div class="col-md-6">

                        {{--                 <select name="lista_id[]" class="form-control selectpicker"
                                                multiple="multiple"
                                                data-placeholder="Selecciona uno o más practicantes"
                                                style="width: 100%;">
                                              @foreach ($lists as $tag)
                                                        <option {{ collect(old('lists', $puesto->lists->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->num_puesto }}
                                                        </option>
                                              @endforeach
                                          </select> --}}
                                          {{-- {{ dd($puesto->lists->pluck('id')->implode(', ')) }} --}}
                                            <list-puesto-edit
                                                :puestos="{{ json_encode($lists) }}"
                                                :oldpuestos="{{ json_encode(old('lista_id', $puesto->lists->pluck('id'))) }}">
                                            </list-puesto-edit>

                                        {!! $errors->first('lista_id', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="medidas" class="col-md-4 col-form-label text-md-right font-weight-normal">Medidas</label>

                                    <div class="col-md-6">
                                        <input id="medidas" type="text" class="form-control @error('medidas') is-invalid @enderror" name="medidas" value="{{ old('medidas', $puesto->medidas) }}" required autocomplete="medidas" autofocus>

                                        @error('medidas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ubicacion_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Ubicación</label>

                                    <div class="col-md-6">
                                        <select class="form-control selectpicker" name="ubicacion_id" data-live-search="true">
                                            @foreach ($ubicaciones as $ubicacion)
                                                <option class="" value="{{ $ubicacion->id }}"
                                                    {{ old('ubicacion_id', $puesto->ubicacion_id) == $ubicacion->id ? 'selected' : '' }}
                                                    >{{ $ubicacion->nombre }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('ubicacion_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="sisa" class="col-md-4 col-form-label text-md-right font-weight-normal">Sisa Puesto</label>

                                    <div class="col-md-6">
                                        <input id="sisa" type="number" step="any" class="form-control @error('sisa') is-invalid @enderror" name="sisa" value="{{ old('sisa', $puesto->sisa) }}" required autocomplete="sisa" autofocus>

                                        @error('sisa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sisa_diaria" class="col-md-4 col-form-label text-md-right font-weight-normal">Sisa Diaria</label>

                                    <div class="col-md-6">
                                        <input id="sisa_diaria" type="number" step="any" class="form-control @error('sisa_diaria') is-invalid @enderror" name="sisa_diaria" value="{{ old('sisa_diaria', $puesto->sisa_diaria) }}" required autocomplete="sisa_diaria" autofocus>

                                        @error('sisa_diaria')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cantidad_puesto" class="col-md-4 col-form-label text-md-right font-weight-normal">Cant. Puesto</label>

                                    <div class="col-md-6">
                                        <input id="cantidad_puesto" type="number" class="form-control @error('cantidad_puesto') is-invalid @enderror" name="cantidad_puesto" value="{{ old('cantidad_puesto', $puesto->cantidad_puesto) }}" required autocomplete="cantidad_puesto" autofocus>

                                        @error('cantidad_puesto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="actividad_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Actividad</label>

                                    <div class="col-md-6">
                                        <select class="form-control selectpicker" name="actividad_id" data-live-search="true">
                                            @foreach ($actividades as $actividad)
                                                <option class="" value="{{ $actividad->id }}"
                                                    {{ old('actividad_id', $puesto->actividad_id) == $actividad->id ? 'selected' : '' }}
                                                    >{{ $actividad->nombre }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('actividad_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="riesgo_exposicion" class="col-md-4 col-form-label text-md-right font-weight-normal">R. Exposición</label>

                            <div class="col-md-5">
                                <input id="riesgo_exposicion" type="text" class="form-control @error('riesgo_exposicion') is-invalid @enderror" name="riesgo_exposicion" value="{{ old('riesgo_exposicion', $puesto->riesgo_exposicion) }}" required autocomplete="riesgo_exposicion" autofocus>

                                @error('riesgo_exposicion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{-- {{ $btn }} --}}
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
