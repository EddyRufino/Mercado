<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Lista De Puestos</title>

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

        <h4 class="text-center font-color">Lista De Puestos</h4>

        <table class="table">
            <thead>
                <tr bgcolor="#5D6D7E" class="font-color-white">
                    <th scope="col">Conductor</th>
                    <th scope="col">N. Puesto</th>
                    {{-- <th scope="col">C. Puesto</th> --}}
                    {{-- <th scope="col">Medidas</th> --}}
                    <th scope="col">Sisa Puesto</th>
                    <th scope="col">Sisa Diaria</th>
                    {{-- <th scope="col">R. Exposición</th> --}}
                    <th scope="col">Ubicación</th>
                    <th scope="col">Actividad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                    <tr>
                        <td>{{ $puesto->user->name }} {{ $puesto->user->apellido }}</td>
                        <td>{{ $puesto->lists->pluck('num_puesto')->implode(', ') }}</td>
                        {{-- <td>{{ $puesto->cantidad_puesto }}</td> --}}
                        {{-- <td>{{ $puesto->medidas }}</td> --}}
                        <td>S/. {{ $puesto->sisa }}</td>
                        <td>S/. {{ $puesto->sisa_diaria }}</td>
                        {{-- <td>{{ $puesto->riesgo_exposicion }}</td> --}}
                        <td>{{ $puesto->ubicacion->nombre }}</td>
                        <td>{{ $puesto->actividad->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
