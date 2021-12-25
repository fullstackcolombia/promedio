@extends('index')

@section('content')
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Lista de notas <a href="{{url('create')}}" class="btn btn-success btn-sm float-end"> Crear</a></h5>
		
		<div class="table-responsive">
			<form method="post" class="delete-form-fsc d-none" data-msj="<?php echo 'La nota ha sido eliminada correctamente.'; ?>">
			{{csrf_field()}}
			{{method_field('DELETE')}}
			</form>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Estudiante</th>
						<th scope="col">Parcial 1</th>
						<th scope="col">Parcial 2</th>
						<th scope="col">Parcial 3</th>
						<th scope="col">Final</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($lista) > 0){ ?>
					<?php foreach($lista as $key => $row){ ?>
					<tr>
						<th scope="row"><?php echo $key+1; ?></th>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->parcial1; ?></td>
						<td><?php echo $row->parcial2; ?></td>
						<td><?php echo $row->parcial3; ?></td>
						<td><?php echo $row->final; ?></td>
						<td><a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="if (confirm('Esta seguro(a) que desea eliminar la nota?')){trash_item(<?php echo $row->id; ?>,'<?php echo url('nota/'.$row->id); ?>')}else{event.stopPropagation(); event.preventDefault();};">Eliminar</a></td>
					</tr>
					<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<hr>
<div class="d-grid gap-2 col-6 mx-auto">
<a href="{{url('cliente')}}" class="btn btn-warning btn-lg btn-block"> Ejemplo de cliente API</a>
</div>
@endsection