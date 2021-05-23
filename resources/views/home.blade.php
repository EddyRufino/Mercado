@extends('admin.layout')

@section('content')
<div class="container">
    @if (auth()->user()->hasRoles(['admin', 'cobrador', 'secretaria']))
        @include('partials.search', [
            'title' => 'Buscar Conductor',
            'placeholder' => 'Buscar por apellido',
            'link' => 'comerciante.search'
        ])
    @endif
</div>
@endsection
