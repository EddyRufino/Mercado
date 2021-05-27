@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Crear N. De Talonario',
                        'link' => 'talonarios.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('talonarios.store') }}">
                            @csrf

                            @include('forms.formTalonarios', [
                                'talonario' => new App\Talonario,
                                'btn' => 'Guardar'
                                ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
