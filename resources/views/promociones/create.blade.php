@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                @include('partials.card-header', [
                    'title' => 'Nueva Promoción',
                    'link' => 'promociones.index'
                ])
                <div class="card-body">
                    <form method="POST" action="{{ route('promociones.store') }}">
                        @csrf

                        @include('forms.formPromocion', [
                                'promocion' => new App\Promocion,
                                'btn' => 'Guardar'
                            ])

                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
