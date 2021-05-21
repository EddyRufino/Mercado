<div class="form-group row">
    <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Pagos</label>

    <div class="col-md-6">
        <select class="form-control selectpicker" name="fecha" required data-live-search="true">
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
    <label for="num_operacion" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Operación</label>

    <div class="col-md-6">
        <input id="num_operacion" type="text" class="form-control @error('num_operacion') is-invalid @enderror" name="num_operacion" value="{{ old('num_operacion', $pago->num_operacion) }}" required autocomplete="num_operacion" autofocus>

        @error('num_operacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="monto_deposito" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Deposito</label>

    <div class="col-md-6">
        <input id="monto_deposito" type="text" class="form-control @error('monto_deposito') is-invalid @enderror" name="monto_deposito" value="{{ old('monto_deposito', $pago->monto_deposito) }}" required autocomplete="monto_deposito" autofocus>

        @error('monto_deposito')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="fecha_deposito" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Deposito</label>

    <div class="col-md-6">
        <input type="date" id="start" name="fecha_deposito" class="form-control @error('fecha_deposito') is-invalid @enderror" value="<?php echo date("Y-m-d"); ?>" min="2018-01-01" max="2030-12-31" required >

        @error('fecha_deposito')
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
