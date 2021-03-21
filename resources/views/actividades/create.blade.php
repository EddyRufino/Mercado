@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Crear Actividad',
                        'link' => 'actividades.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('actividades.store') }}">
                            @csrf

                            @include('forms.formActividades', [
                                'actividade' => new App\Actividad,
                                'btn' => 'Guardar'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
