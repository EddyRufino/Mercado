@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Crear Puesto',
                        'link' => 'puestos.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.store') }}">
                            @csrf

                            @include('forms.formPuestos', [
                                'puesto' => new App\Puesto,
                                'btn' => 'Guardar'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
