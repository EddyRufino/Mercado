<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Lista De Conductores</title>

    <style>
        .circle {
            display: block;
            width: 200px;
            height: 70px;
            padding-bottom: .7rem;
        }

        .text-center {
            display: inline-block;
            text-align: center;
            font-size: 1.1em;
        }

        .header-title {
            display: inline-block;
            margin-left: 4.5rem;
        }

        .font-color {
            color: #1F2937;
        }

        .center {
            text-align: center;
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
            <span class="text-center header-title font-color">
                <strong >MUNICIPALIDAD DISTRITAL DE CASTILLA <br> GERENCIA DE DESARROLLO LOCAL <br> SUBGERENCIA DE COMERCIALIZACION <br> ADMINISTRACION DEL MERCADO DE CASTILLA
                </strong>
            </span>
        </div>

        <h4 class="center font-color">LISTADO DE CONDUCTORES DEL MERCADO DE CASTILLA - PIURA</h4>

        <table class="table">
            <thead>
                <tr bgcolor="#5D6D7E" class="font-color-white">
                    <th scope="col">CONDUCTOR</th>
                    <th scope="col">DNI</th>
                    <th scope="col">PUESTO</th>
                    <th scope="col">R. EXPOSICIÓN</th>
                    <th scope="col">ACTIVIDAD</th>
                    <th scope="col">UBICACIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conductores as $conductor)
                    <tr>
                        <td>{{ $conductor->user->name }} {{ $conductor->user->apellido }}</td>
                        <td>{{ $conductor->user->dni }}</td>
                        <td>{{ $conductor->lists->pluck('num_puesto')->implode(', ') }}</td>
                        <td>{{ $conductor->riesgo_exposicion }}</td>
                        <td>{{ $conductor->ubicacion->nombre }}</td>
                        <td>{{ $conductor->actividad->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
