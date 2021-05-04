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
            <h4 class="text-center font-weight-bold">Lista de Deudas</h4>
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
                        <th scope="col">Constancia de Conducción</th>
                        <th scope="col">Remodelación de Puesto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sisas as $pago)
                        <tr>
{{--                             @if ($loop->first)
                                <td>{{ $pago->fecha }}</td>
                                <td>{{ $khaaa }}</td>
                                <td>{{ $pago->sum('monto_sisa') + $pago->puesto->deudas->sum('monto_sisa') }}</td>
                                <td>{{ $pago->sum('monto_sisa') }}</td>
                                <td></td>
                                <td>{{ $pago->puesto->deudas->sum('monto_sisa') }}</td>
                            @endif --}}


{{--                             <td>{{ $pago->fecha }}</td>
                            <td></td>
                            <td>{{ $pago->sum('monto_sisa') + $pago->puesto->deudas->sum('monto_sisa') }}</td>
                            <td>{{ $pago->sum('monto_sisa') }}</td>
                            <td></td>
                            <td>{{ $pago->puesto->deudas->sum('monto_sisa') }}</td>
                            <td></td>
                            <td>{{ $pago->sum('monto_agua') }}</td>
                            <td></td> --}}

                            <td>{{ $pago->fecha }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $pago->monto_sisa }}</td>
                            <td></td>
                            {{-- {{ $pago->puesto->deudas->pluck('monto_sisa')->implode(' ') }} --}}
                            <td>{{ $pago->monto_agua }}</td>
                            <td></td>
                            <td>{{ $pago->monto_remodelacion }}</td>


{{--                             <td>{{ $pago->num_operacion }}</td>
                            <td>{{ $pago->puesto->lists->pluck('num_puesto')->implode(', ') }}</td>
                            <td>S/. {{ $pago->monto_sisa }}</td>
                            <td>S/. {{ $pago->monto_agua }}</td>
                            <td>S/. {{ $pago->monto_remodelacion }}</td>
                            <td>S/. {{ $pago->monto_constancia }}</td>
                            <td>{{ $pago->puesto->ubicacion->nombre }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
