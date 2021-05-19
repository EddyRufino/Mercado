<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Lista Tickets Del Día</title>

</head>
<body>
    <div>
        <h4 class="text-center font-weight-bold">Lista Tickets Del Día</h4>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Día</th>
                    <th scope="col">Total Diario</th>
                    <th scope="col">Monto Taza</th>
                    <th scope="col">Monto Ducha</th>
                    {{-- <th scope="col">Total Semana</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTicket as $pago)
                    <tr>
                        <td>{{ $pago->pluck('fecha')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_diario')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_taza')->implode(' ') }}</td>
                        <td>{{ $pago->pluck('total_ducha')->implode(' ') }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <th>Monto Pago Total:</th>
                        <td>{{ $total }}</td>
                        <td>{{ $pagoTaza }}</td>
                        <td>{{ $pagoDucha }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
