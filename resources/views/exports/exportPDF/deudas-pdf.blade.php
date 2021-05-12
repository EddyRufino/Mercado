<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Lista De Deudas</title>

    <style>
        .circle {
            display: block;
            width: 160px;
            height: 50px;
        }

        .text-center {
            display: block;
            text-align: center;
            font-size: 1.2em;
        }

        .header {
        }

        .header-title {
            display: inline-block;
            margin-left: 40%;
            margin-top: -8px;
        }

        .font-color {
            color: #34495E;
        }

        .font-color-white {
            color: white;
        }

        table {
          /*font-family: arial, sans-serif;*/
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          text-align: left;
          padding: 8px 0;
        }

        tr:nth-child(even) {
          background-color: #F4F6F7;
        }
    </style>

</head>
<body>
    <div>
        <div class="header">
            <img src="{{ asset('img/logo.png') }}" alt="Minucipalidad De Castilla" class="circle">
            <h3 class="header-title font-color"><strong >Gerencia De Desarrollo Local</strong></h3>
        </div>

            <h4 class="text-center font-color">Lista De Deudas</h4>

            <table class="table">
                <thead>
                    <tr bgcolor="#5D6D7E" class="font-color-white">
                        <th scope="col">Conductor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Sisa Diaria</th>
                        <th scope="col">Monto Agua</th>
                        <th scope="col">Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deudas as $deuda)
                        <tr>
                            <td>{{ $deuda->puesto->user->name }} {{ $deuda->puesto->user->apellido }}</td>
                            <td>{{ $deuda->fecha }}</td>
                            <td>{{ $deuda->puesto->lists->pluck('num_puesto')->implode(', ') }}</td>

                            @if (!is_Null($deuda->monto_sisa))
                                <td>S/. {{ $deuda->monto_sisa }}</td>
                            @else
                                <td>{{ $deuda->monto_sisa }}</td>
                            @endif

                            @if (!is_Null($deuda->monto_agua))
                                <td>S/. {{ $deuda->monto_agua }}</td>                                {{-- expr --}}
                            @else
                                <td>{{ $deuda->monto_agua }}</td>
                            @endif

                            <td>{{ $deuda->puesto->ubicacion->nombre }}</td>
                        </tr>
                    @endforeach
                       <tr>
                            <th>Monto Deuda Sisa:</th>
                            <td>S/. {{ $deudaSisa }}</td>
                        </tr>
                        <tr>
                            <th>Monto Deuda Agua:</th>
                            <td>S/. {{ $deudaAgua }}</td>
                        </tr>
                </tbody>
            </table>
    </div>
</body>
</html>
