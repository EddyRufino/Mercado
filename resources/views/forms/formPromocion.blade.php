<div class="form-group row">
    <label for="nombre_empresa" class="col-md-4 col-form-label text-md-right font-weight-normal">Nombre Empresa</label>

    <div class="col-md-6">
        <input id="nombre_empresa" type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" name="nombre_empresa" value="{{ old('nombre_empresa', $promocion->nombre_empresa) }}" required autocomplete="nombre_empresa" autofocus>

        @error('nombre_empresa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="ruc" class="col-md-4 col-form-label text-md-right font-weight-normal">R.U.C Empresa</label>

    <div class="col-md-6">
        <input id="ruc" type="text" class="form-control @error('ruc') is-invalid @enderror" name="ruc" value="{{ old('ruc', $promocion->ruc) }}" required autocomplete="ruc" autofocus>

        @error('ruc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha Inicio</label>

    <div class="col-md-6">
        <input type="date" id="start" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="<?php echo date("Y-m-d"); ?>" min="2018-01-01" max="2030-12-31" required >

        @error('fecha_inicio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="monto" class="col-md-4 col-form-label text-md-right font-weight-normal">Monto Pago</label>

    <div class="col-md-6">
        <input id="monto" type="text" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto', $promocion->monto) }}" required autocomplete="monto" autofocus>

        @error('monto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="telefono" class="col-md-4 col-form-label text-md-right font-weight-normal">Teléfono</label>

    <div class="col-md-6">
        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono', $promocion->telefono) }}" required autocomplete="telefono" autofocus>

        @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal">N. Recibo</label>

    <div class="col-md-6">
        <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ mt_rand(0, 9999999999) }}" readonly autocomplete="num_recibo" autofocus>

        @error('num_recibo')
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
