<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Document</title>

    <style>
        table {
            width: 100%;
        }

        td {
            padding: 4px;
        }

        .circle {
            display: block;
            width: 160px;
            height: 50px;
        }

        .d-flex {
            display: flex;
            position: relative;
            align-content: center;
            justify-content: space-between;
            width: 100%;
        }

        .text-center {
            display: block;
            text-align: center;
            font-size: 1.2em;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="text-center">
            {{-- <img src="{{ asset('img/logo.png') }}" alt="Minu Castilla" class="circle"> --}}
        </div>
            <h4 class="text-center font-weight-bold">Lista de Pagos Anticipados</h4>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Conductor</th>
                        <th scope="col">Fecha Pago</th>
                        <th scope="col">Fecha Pago Anticipada</th>
                        <th scope="col">Número Recibo</th>
                        <th scope="col">Número Operación</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Monto Sisa</th>
                        {{-- <th scope="col">Monto Agua</th> --}}
                        <th scope="col">Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagos as $pago)
                        <tr>
                            <td>{{ $pago->puesto->user->name }} {{ $pago->puesto->user->apellido }}</td>
                            <td>{{ $pago->fecha }}</td>
                            <td>{{ $pago->fecha_anticipada }}</td>
                            <td>{{ $pago->num_recibo }}</td>
                            <td>{{ $pago->num_operacion }}</td>
                            <td>{{ $pago->puesto->lists->pluck('num_puesto')->implode(', ') }}</td>
                            <td>{{ $pago->monto_sisa_anticipada }}</td>
                            {{-- <td>{{ $pago->monto_agua_anticipada }}</td> --}}
                            <td>{{ $pago->puesto->ubicacion->nombre }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <th>Monto Pago Anticipado Sisa:</th>
                            <td>{{ $pagoAntipadoSisa }}</td>
                        </tr>
                        <tr>
                            <th>Monto Pago Anticipado Agua:</th>
                            <td>{{ $pagoAntipadoAgua }}</td>
                        </tr>
                </tbody>
            </table>
    </div>
</body>
</html>
