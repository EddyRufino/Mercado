@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Editar Puesto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.update', $puesto->id) }}">
                            @csrf
                            @method('PUT')

                            @include('forms.formPuestos', ['btn' => 'Editar Puesto'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
