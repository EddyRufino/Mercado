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
            <h4 class="text-center font-weight-bold">Lista de Conductores</h4>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Conductor</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">R. Exposición</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conductores as $conductor)
                        <tr>
                            <td>{{ $conductor->name }} {{ $conductor->apellido }}</td>
                            <td>{{ $conductor->dni }}</td>
                            <td>{{ $conductor->num_puesto }}</td>
                            <td>{{ $conductor->riesgo_exposicion }}</td>
                            <td>{{ $conductor->actividad }}</td>
                            <td>{{ $conductor->ubicacion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
