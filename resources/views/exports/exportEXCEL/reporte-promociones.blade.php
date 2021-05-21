<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Promociones</title>
</head>
<body>
    <div>
        <h4 class="text-center font-weight-bold">Lista de Promociones</h4>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Nombre Empresa</th>
                    <th scope="col">RUC</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">N. Operación</th>
                    <th scope="col">Fecha Deposito</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promociones as $promocion)
                    <tr>
                        <td>{{ $promocion->nombre_empresa }}</td>
                        <td>{{ $promocion->ruc }}</td>
                        <td>{{ $promocion->fecha_inicio }}</td>
                        <td>{{ $promocion->monto }}</td>
                        <td>{{ $promocion->telefono }}</td>
                        <td>{{ $promocion->num_operacion }}</td>
                        <td>{{ $promocion->fecha_deposito }}</td>
                    </tr>
                @endforeach
                    <tr><th></th></tr>
                    <tr>
                        <th>Monto Total Promociones:</th>
                        <td>{{ $montoPromo }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
