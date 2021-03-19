@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Crear Actividad</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('actividades.store') }}">
                            @csrf

                            @include('forms.formActividades', [
                                'actividade' => new App\Actividad,
                                'btn' => 'Crear Actividad'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
