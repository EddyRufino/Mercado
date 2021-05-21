<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Tickets Del Día</title>

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

        .header {
        }

        .header-title {
            display: inline-block;
            margin-left: 4.5rem;
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

        .mt {
            padding-top: 1rem;
        }
    </style>

</head>
<body>
    <div>
        <div class="">
            <img src="{{ asset('img/logo.png') }}" alt="Minucipalidad De Castilla" class="circle">
            <span class="text-center header-title font-color">
                <strong >MUNICIPALIDAD DISTRITAL DE CASTILLA <br> GERENCIA DE DESARROLLO LOCAL <br> SUBGERENCIA DE COMERCIALIZACION <br> ADMINISTRACION DEL MERCADO DE CASTILLA
                </strong>
            </span>
        </div>

        <h4 class="font-color">LIQUIDACION DE COBRANZA DE SERVICIOS HIGIENICOS</h4>

        <span >DIA {{today()->format('d')}} DE {{today()->format('m')}} del {{today()->format('Y')}}</span><br>
        <span>N. DE OPERACION: {{ $num_operacion->implode(' ') }}</span>


        <table class="table mt">
            <thead>
                <tr bgcolor="#5D6D7E" class="font-color-white" >
                    <th>CONCEPTO</th>
                    <th>DESDE</th>
                    <th>HASTA</th>
                    <th>T. RECIBOS</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>TAZA <br> <span>S/. 0.50</span></td>
                    <td>{{ $desdeTaza->num_correlativo }}</td>
                    <td>{{ $hastaTaza->num_correlativo }}</td>
                    <td>{{ $tazaCount }}</td>
                    <td>S/. {{ $tazaTotal }}</td>
                </tr>
                <tr>
                    <td>DUCHA <br> <span>S/. 1</span></td>
                    <td>{{ $desdeDucha->num_correlativo }}</td>
                    <td>{{ $hastaDucha->num_correlativo }}</td>
                    <td>{{ $duchaCount }}</td>
                    <td>S/. {{ $duchaTotal }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td>S/. {{ $total }}</td>
                </tr>
            </tbody>
        </table>
        {{-- <h4 class="font-color">ATENTAMENTE.</h4> --}}
    </div>
</body>
</html>
