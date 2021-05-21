<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Lista de Pagos</title>

</head>
<body>
    <div class="container">
        <h2 class="text-center font-weight-bold">Lista de Pagos</h2>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Conductor</th>
                    <th scope="col">Fecha Pago</th>
                    <th scope="col">Fecha Concepto Pago</th>
                    <th scope="col">Número Recibo</th>
                    <th scope="col">Número Operación</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Monto Sisa</th>
                    <th scope="col">Monto Agua</th>
                    <th scope="col">Monto Remodelación</th>
                    <th scope="col">Monto Constancia</th>
                    <th scope="col">Ubicación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->puesto->user->name }} {{ $pago->puesto->user->apellido }}</td>
                        <td>{{ $pago->fecha }}</td>
                        <td>{{ $pago->fecha_deuda }}</td>
                        <td>{{ $pago->num_recibo }}</td>
                        <td>{{ $pago->num_operacion }}</td>
                        <td>{{ $pago->puesto->lists->pluck('num_puesto')->implode(', ') }}</td>
                        <td>{{ $pago->monto_sisa }}</td>
                        <td>{{ $pago->monto_agua }}</td>
                        <td>{{ $pago->monto_remodelacion }}</td>
                        <td>{{ $pago->monto_constancia }}</td>
                        <td>{{ $pago->puesto->ubicacion->nombre }}</td>
                    </tr>
                @endforeach
                    <tr><th></th><td></td></tr>
                    <tr>
                        <th>Monto Pago Sisa:</th>
                        <td>S/. {{ $pagoSisa }}</td>
                    </tr>
                    <tr>
                        <th>Monto Pago Agua:</th>
                        <td>S/. {{ $pagoAgua }}</td>
                    </tr>
                    <tr>
                        <th>Monto Pago Remodelación:</th>
                        <td>S/. {{ $pagoRemodelacion }}</td>
                    </tr>
                    <tr>
                        <th>Monto Pago Constancia:</th>
                        <td>S/. {{ $pagoConstancia }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
