@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Crear Ubicación</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ubicaciones.store') }}">
                            @csrf

                            @include('forms.formUbicaciones', [
                                'ubicacione' => new App\Ubicacion,
                                'btn' => 'Crear Ubicacion'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
