<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="user_id" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Conductor</label>

            <div class="col-md-6">
                <select class="form-control selectpicker" name="user_id" data-live-search="true">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
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
            <label for="lista_id" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">N. Puesto</label>

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
                    <list-puestos
                        :puestos="{{ json_encode($lists) }}"
                        :oldpuestos="{{ json_encode(old('lista_id', $puesto->lists->pluck('id'))) }}">
                    </list-puestos>

            <!-- Button trigger modal -->
{{--             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Agregar puestos
            </button> --}}

            <!-- Modal -->
{{--             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listado de Puestos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <list-puestos
                        :puestos="{{ json_encode($lists) }}"
                        :oldpuestos="{{ json_encode(old('num_puesto', $puesto->num_puesto)) }}">
                    </list-puestos>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div> --}}


                @error('lista_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="medidas" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Medidas</label>

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
            <label for="ubicacion_id" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Ubicación</label>

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

        <div class="form-group row">
            <label for="riesgo_exposicion" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">R. Exposición</label>

            <div class="col-md-6">
                <input id="riesgo_exposicion" type="text" class="form-control @error('riesgo_exposicion') is-invalid @enderror" name="riesgo_exposicion" value="{{ old('riesgo_exposicion', $puesto->riesgo_exposicion) }}" required autocomplete="riesgo_exposicion" autofocus>

                @error('riesgo_exposicion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label for="sisa" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Sisa Puesto</label>

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
            <label for="sisa_diaria" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Sisa Diaria</label>

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
            <label for="cantidad_puesto" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Cant. Puesto</label>

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
            <label for="actividad_id" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Actividad</label>

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

        <div class="form-group row">
            <label for="monto_agua" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Monto Agua</label>

            <div class="col-md-6">
                <input id="monto_agua" type="number" step="any" class="form-control @error('monto_agua') is-invalid @enderror" name="monto_agua" value="{{ old('monto_agua', $puesto->monto_agua) }}" required autocomplete="monto_agua" autofocus>

                @error('monto_agua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-6">


    </div>
    {{-- <div class="col-md-6"> --}}
{{--         <div class="form-group row">
            <label for="sisa_diaria" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Sisa Diaria</label>

            <div class="col-md-6">
                <input id="sisa_diaria" type="number" step="any" class="form-control @error('sisa_diaria') is-invalid @enderror" name="sisa_diaria" value="{{ old('sisa_diaria', $puesto->sisa_diaria) }}" required autocomplete="sisa_diaria" autofocus>

                @error('sisa_diaria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> --}}
    {{-- </div> --}}
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4 mt-2">
        <button type="submit" class="btn btn-primary">
            {{ $btn }}
        </button>
        <a href="{{ route('home') }}" class="btn btn-light text-dark">
            Cancelar
        </a>
    </div>
</div>
