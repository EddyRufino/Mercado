@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Crear Puesto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.store') }}">
                            @csrf

                            @include('forms.formPuestos', [
                                'puesto' => new App\Puesto,
                                'btn' => 'Crear Puesto'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
