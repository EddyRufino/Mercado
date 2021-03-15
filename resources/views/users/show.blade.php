@extends('admin.layout')

@section('content')
	<div class="container ">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 p-4">
				<h1 class="display_4 text-secondary">Perfil</h1>
			</div>
		</div>
		<div class="row pl-4">
		    <p class="lead">Nombre: </p>
		    <p class="color-secondary lead form-control border-0">{{ $user->name }}</p>
		    <p class="lead">Correo: </p>
		    <p class="color-secondary lead form-control border-0">{{ $user->email }}</p>
		    <a class="btn btn-success" href="{{ route('usuarios.edit', $user->id) }}">Editar perfil</a>
		</div>
	</div>
@endsection