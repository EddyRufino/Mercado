@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Crear Ubicación',
                        'link' => 'ubicaciones.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('ubicaciones.store') }}">
                            @csrf

                            @include('forms.formUbicaciones', [
                                'ubicacione' => new App\Ubicacion,
                                'btn' => 'Guardar'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
