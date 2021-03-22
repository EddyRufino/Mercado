@extends('admin.layout')

@section('content')
<div class="container">
    @include('partials.search', [
        'title' => 'Buscar Conductor',
        'link' => 'comerciante.search'
    ])
</div>
@endsection
