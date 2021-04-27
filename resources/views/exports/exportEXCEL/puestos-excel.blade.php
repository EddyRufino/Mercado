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
            <h4 class="text-center font-weight-bold">Lista de Puestos</h4>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Conductor</th>
                        <th scope="col">N. Puesto</th>
                        <th scope="col">C. Puesto</th>
                        <th scope="col">Medidas</th>
                        <th scope="col">Sisa Puesto</th>
                        <th scope="col">Sisa Diaria</th>
                        <th scope="col">R. Exposición</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Actividad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->user->name }} {{ $puesto->user->apellido }}</td>
                            <td>{{ $puesto->lists->pluck('num_puesto')->implode(', ') }}</td>
                            <td>{{ $puesto->cantidad_puesto }}</td>
                            <td>{{ $puesto->medidas }}</td>
                            <td>S/. {{ $puesto->sisa }}</td>
                            <td>S/. {{ $puesto->sisa_diaria }}</td>
                            <td>{{ $puesto->riesgo_exposicion }}</td>
                            <td>{{ $puesto->ubicacion->nombre }}</td>
                            <td>{{ $puesto->actividad->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
