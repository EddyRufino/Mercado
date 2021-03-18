<div class="form-group row">
    <label for="nombre" class="col-md-4 col-form-label text-md-right font-weight-normal">Nombre</label>

    <div class="col-md-6">
        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $ubicacione->nombre) }}" required autocomplete="nombre" autofocus>

        @error('nombre')
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
        <a href="{{ route('home') }}" class="btn btn-secondary text-white">
            Cancelar
        </a>
    </div>
</div>
