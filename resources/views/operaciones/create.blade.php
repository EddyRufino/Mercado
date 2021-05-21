@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-3">
                @include('partials.card-header', [
                    'title' => 'N. Operación Sisa',
                    'link' => 'operaciones.create'
                ])
                <div class="card-body">
                    <form method="POST" action="{{ route('pagos.store') }}">
                        @csrf

                        @include('forms.formOperacion', [
                                'pago' => new App\Pago,
                                'btn' => 'Guardar'
                            ])

                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
