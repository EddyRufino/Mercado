<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Pagos Del Mes</title>

</head>
<body>
    <div>
        <h2>Lista de Deudas</h2>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Día</th>
                    <th scope="col">Total Diario</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Sisa al Día</th>
                    <th scope="col">Sisa Anticipada</th>
                    <th scope="col">Sisa Morosa</th>
                    <th scope="col">Agua</th>
                    <th scope="col">Agua Anticipada</th>
                    <th scope="col">Constancia de Conducción</th>
                    <th scope="col">Remodelación de Puesto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPago as $pago)
                    <tr>
                        <td>{{ $pago->pluck('fecha')->implode(' ') }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $pago->pluck('total_sisa')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_sisa_anticipada')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_deuda_sisa')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_agua')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_agua_anticipada')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_constancia')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_remodelacion')->implode(' ') }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td>Monto Total</td>
                        <td></td>
                        <td></td>
                        <td>{{ $sisaDia }}</td>
                        <td>{{ $sisaDiaAnticipada }}</td>
                        <td>{{ $deudaDia }}</td>
                        <td>{{ $aguaDia }}</td>
                        <td>{{ $aguaDiaAnticipada }}</td>
                        <td>{{ $constanciaDia }}</td>
                        <td>{{ $remodelacionDia }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
