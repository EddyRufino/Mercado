@extends('admin.layout')

@section('content')
<div class="container">
    @include('partials.search', [
        'title' => 'Buscar Conductor',
        'placeholder' => 'Buscar por apellido',
        'link' => 'comerciante.search'
    ])
</div>
@endsection
