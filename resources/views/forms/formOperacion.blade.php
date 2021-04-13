<div class="form-group row">
    <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Pagos</label>

    <div class="col-md-6">
        <select class="form-control select2 " name="fecha" required>
            @foreach ($pagos as $pago)
                <option class="" value="{{ $pago->fecha }}">
                    {{ $pago->fecha }}
                </option>
            @endforeach
        </select>

        @error('pago_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="num_operacion" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Operacion</label>

    <div class="col-md-6">
        <input id="num_operacion" type="text" class="form-control @error('num_operacion') is-invalid @enderror" name="num_operacion" value="{{ old('num_operacion', $pago->num_operacion) }}" required autocomplete="num_operacion" autofocus>

        @error('num_operacion')
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
