@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar N. De Talonario',
                        'link' => 'talonarios.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('talonarios.update', $talonario->id) }}">
                        @csrf
                        @method('PUT')

                            @include('forms.formTalonarios', ['btn' => 'Editar'])

                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
