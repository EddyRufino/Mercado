@extends('admin.layout')

@section('content')
<div class="container">
    @include('partials.search-reporte', [
            'title' => 'Generar Reporte Deudas',
            'link' => 'reporte.deuda'
        ])

    @include('partials.search-reporte', [
            'title' => 'Generar Reporte Pagos',
            'link' => 'reporte.pago'
        ])
</div>
@endsection
