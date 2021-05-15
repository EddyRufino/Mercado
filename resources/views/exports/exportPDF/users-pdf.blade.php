<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Lista De Usuarios</title>

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

        <h4 class="text-center font-color">Lista De Usuarios</h4>

        <table class="table">
            <thead>
                <tr bgcolor="#5D6D7E" class="font-color-white">
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->apellido }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
