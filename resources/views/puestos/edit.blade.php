@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Editar Puesto',
                        'link' => 'puestos.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.update', $puesto->id) }}">
                            @csrf
                            @method('PUT')

                            @include('forms.formPuestos', ['btn' => 'Editar'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
