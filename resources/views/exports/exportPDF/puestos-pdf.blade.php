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
          background-color: #F3F4F6;
        }

        .center {
            text-align: center;
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

        <h4 class="center font-color">LISTADO DE PUESTOS DEL MERCADO DE CASTILLA - PIURA</h4>

        <table class="table">
            <thead>
                <tr bgcolor="#5D6D7E" class="font-color-white">
                    <th scope="col">CONDUCTOR</th>
                    <th scope="col">N. PUESTO</th>
                    {{-- <th scope="col">C. Puesto</th> --}}
                    {{-- <th scope="col">Medidas</th> --}}
                    <th scope="col">SISA PUESTO</th>
                    <th scope="col">SISA DIARIA</th>
                    {{-- <th scope="col">R. Exposición</th> --}}
                    <th scope="col">UBICACIÓN</th>
                    <th scope="col">ACTIVIDAD</th>
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
