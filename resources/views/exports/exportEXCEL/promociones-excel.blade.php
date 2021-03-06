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
            <h4 class="text-center font-weight-bold">Lista de Promociones</h4>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Nombre Empresa</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Fin</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promociones as $promocion)
                        <tr>
                            <td>{{ $promocion->nombre_empresa }}</td>
                            <td>{{ $promocion->fecha_inicio }}</td>
                            <td>{{ $promocion->fecha_fin }}</td>
                            <td>S/. {{ $promocion->monto }}</td>
                            <td>{{ $promocion->telefono }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</body>
</html>
