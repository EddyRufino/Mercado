@extends('admin.layout')

@section('content')
<div class="container">
    @include('partials.search', [
            'title' => 'Generar Reporte Deudas',
            'placeholder' => 'Ejemplo 2020-08-26',
            'link' => 'reporte.deuda'
        ])

    @include('partials.search', [
            'title' => 'Generar Reporte Pagos',
            'placeholder' => 'Ejemplo 2020-08-26',
            'link' => 'reporte.pago'
        ])

    @include('partials.search', [
            'title' => 'Generar Reporte Sisa Mensual',
            'placeholder' => 'Ejemplo 2020-08-26',
            'link' => 'reporte.sisa'
        ])
</div>
@endsection
