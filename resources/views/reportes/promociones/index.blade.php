@extends('admin.layout')

@section('content')
<div class="container">
    @if (auth()->user()->hasRoles(['admin', 'cobrador']))
        <div class="accordion" id="accordionExample">
            <div class="card-header" >
                <div class="btn btn-info font-weight-bold text-left d-inline"
                    data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                >
                    <span id="headingOne">Reporte Promociones Excel</span>
                </div>
{{--                 <div class="btn btn-primary text-left d-inline" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span id="headingTwo">Reporte Baños PDF</span>
                </div> --}}
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Generar Reporte Promociones - Día o Mes',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.promocion.month'
                        ])
                </div>
            </div>
{{--             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Generar Reporte Baños Por Día',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.banio.day'
                        ])
                </div>
            </div> --}}
        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif

</div>
@endsection
