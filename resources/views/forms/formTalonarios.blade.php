<div class="form-group row">
    <label for="num_inicio" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">N. Inicio</label>

    <div class="col-md-6">
        <input id="num_inicio" type="number" class="form-control @error('num_inicio') is-invalid @enderror" name="num_inicio" value="{{ old('num_inicio', $talonario->num_inicio) }}" required autocomplete="num_inicio" autofocus>

        @error('num_inicio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="num_fin" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">N. Fin</label>

    <div class="col-md-6">
        <input id="num_fin" type="number" class="form-control @error('num_fin') is-invalid @enderror" name="num_fin" value="{{ old('num_fin', $talonario->num_fin) }}" required autocomplete="num_fin" autofocus>

        @error('num_fin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="tipo" class="col-md-4 col-form-label text-md-right font-weight-normal text-dark">Tipo Servicio</label>

    <div class="col-md-6">
        <select class="form-control" name="tipo" data-live-search="true">
            <option {{ old('tipo', 1) == $talonario->tipo ? 'selected' : '' }} value="1">
                Sisa
            </option>
            <option {{ old('tipo', 2) == $talonario->tipo ? 'selected' : '' }} value="2">
                Taza
            </option>
            <option {{ old('tipo', 3) == $talonario->tipo ? 'selected' : '' }} value="3">
                Ducha
            </option>
            <option {{ old('tipo', 4) == $talonario->tipo ? 'selected' : '' }} value="4">
                Promoción
            </option>
        </select>

        @error('tipo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ $btn }}
        </button>
        <a href="{{ route('home') }}" class="btn btn-light text-dark">
            Cancelar
        </a>
    </div>
</div>
