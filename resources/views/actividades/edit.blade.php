@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Actividad',
                        'link' => 'actividades.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('actividades.update', $actividade->id) }}">
                        @csrf
                        @method('PUT')

                            @include('forms.formActividades', ['btn' => 'Editar'])

                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
