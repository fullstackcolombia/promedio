@extends('index')

@section('content')
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Crear notas <a href="{{url('/')}}" class="btn btn-dark btn-sm float-end"> Regresar</a></h5>
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form class="form_crear_nota" action="{{url('nota')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="mb-3">
				<label for="nombre" class="form-label">Nombre</label>
				<input id="nombre" name="nombre" type="text" class="form-control name_valid_fsc" value="{{ old('nombre') }}" required>
			</div>
			<div class="mb-3">
				<label for="parcial1" class="form-label">Parcial 1</label>
				<input id="parcial1" name="parcial1" type="text" class="form-control dec_valid_fsc" value="{{ old('parcial1') }}" required>
			</div>
			<div class="mb-3">
				<label for="parcial2" class="form-label">Parcial 2</label>
				<input id="parcial2" name="parcial2" type="text" class="form-control dec_valid_fsc" value="{{ old('parcial2') }}" required>
			</div>
			<div class="mb-3">
				<label for="parcial3" class="form-label">Parcial 3</label>
				<input id="parcial3" name="parcial3" type="text" class="form-control dec_valid_fsc" value="{{ old('parcial3') }}" required>
			</div>
			<p class="p_final"></p>
			<button type="button" class="btn btn-primary btn_crear_nota">Crear</button>
		</form>
	</div>
</div>
@endsection