@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Editar Ubicación</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ubicaciones.update', $ubicacione->id) }}">
                        @csrf
                        @method('PUT')

                            @include('forms.formUbicaciones', ['btn' => 'Editar Ubicación'])

                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
