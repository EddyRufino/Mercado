@extends('admin.layout')

@section('content')
<div class="container">
    @if (auth()->user()->hasRoles(['admin', 'cobrador', 'secretaria']))
        <div class="accordion" id="accordionExample">
            <div class="card-header">
                <div class="btn btn-info font-weight-bold text-left d-inline"
                    data-toggle="collapse"
                    data-target="#collapseTramite"
                    aria-expanded="true"
                    aria-controls="collapseTramite"
                >
                    <span id="headingTramite">Reporte Trámites</span>
                </div>
                <div class="btn btn-info font-weight-bold text-left d-inline"
                    data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                >
                    <span id="headingOne">Reporte Deudas</span>
                </div>
                <div class="btn btn-info font-weight-bold d-inline"
                    data-toggle="collapse"
                    data-target="#collapseTwo"
                    aria-expanded="true"
                    aria-controls="collapseTwo"
                >
                    <span id="headingTwo">Reporte Pagos</span>
                </div>
{{--                 <div class="btn btn-info font-weight-bold d-inline"
                    data-toggle="collapse"
                    data-target="#collapseThree"
                    aria-expanded="true"
                    aria-controls="collapseThree"
                >
                    <span id="headingThree">Reporte Pago Anticipados</span>
                </div> --}}
                <div class="btn btn-info font-weight-bold d-inline"
                    data-toggle="collapse"
                    data-target="#collapseFive"
                    aria-expanded="true"
                    aria-controls="collapseFive"
                >
                    <span id="headingFive">Reporte Sisa Mes</span>
                </div>
            </div>

            <div id="collapseTramite" class="collapse " aria-labelledby="headingTramite" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Trámites - Generar Reporte',
                            'placeholder' => 'Agosto',
                            'link' => 'reporte.tramite'
                        ])
                </div>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Deudas - Generar Reporte',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.deuda'
                        ])
                </div>
            </div>
            <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Pagos - Generar Reporte',
                            'placeholder' => 'Agosto',
                            'link' => 'reporte.pago'
                        ])
                </div>
            </div>
{{--             <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Pagos Anticipados - Generar Reporte',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.sisa'
                        ])
                </div>
            </div> --}}
            <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Sisa Mes - Generar Reporte',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.sisa.mes'
                        ])
                </div>
            </div>
        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif

</div>
@endsection
