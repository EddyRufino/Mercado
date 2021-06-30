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
                    <th scope="col">Fecha Pago</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Fecha Concepto Pago</th>
                    <th scope="col">Número Recibo</th>
                    <th scope="col">Número Operación</th>
                    <th scope="col">Monto Sisa</th>
                    <th scope="col">Monto Agua</th>
                    <th scope="col">Monto Remodelación</th>
                    <th scope="col">Monto Constancia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                     <tr>
                        <td>{{ Carbon\Carbon::create($pago->fecha)->format('Y-m-d') }}</td>
                        <td>{{ $pago->puesto->lists->pluck('num_puesto')->implode(', ') }}</td>
                        <td>{{ strtoupper($pago->puesto->ubicacion->nombre) }}</td>
                        <td>{{ strtoupper($pago->puesto->user->name) }} {{ strtoupper($pago->puesto->user->apellido) }}</td>
                        <td>PAGO {{ $pago->fecha_deuda }} HASTA {{ Carbon\Carbon::create($pago->fecha_deuda)->addDays($pago->cant_dia)->subDay(1)->format('Y-m-d') }}</td>
                        <td>{{ $pago->num_recibo }}</td>
                        <td>{{ $pago->num_operacion }}</td>
                        <td>S/. {{ $pago->cant_dia * $pago->monto_sisa }}</td>
                        <td>{{ $pago->monto_agua }}</td>
                        <td>{{ $pago->monto_remodelacion }}</td>
                        <td>{{ $pago->monto_constancia }}</td>
                    </tr>
                @endforeach
                    <tr><th></th><td></td></tr>
                    <tr>
                        <th>MONTO PAGO SISA:</th>
                        <td>S/. {{ $pagoSisa }}</td>
                    </tr>
                    <tr>
                        <th>MONTO PAGO AGUA:</th>
                        <td>S/. {{ $pagoAgua }}</td>
                    </tr>
                    <tr>
                        <th>MONTO PAGO REMODELACIÓN:</th>
                        <td>S/. {{ $pagoRemodelacion }}</td>
                    </tr>
                    <tr>
                        <th>MONTO PAGO CONSTANCIA:</th>
                        <td>S/. {{ $pagoConstancia }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
