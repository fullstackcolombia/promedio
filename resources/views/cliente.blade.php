<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.css" rel="stylesheet" type="text/css">
    <title>Cliente API ejemplo</title>
  </head>
  <body>
    <!-- Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="addModalLabel">Agregar nota</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
				<form class="ajax_form_fsc" action="{{url('nota')}}" method="post" data-msj="La nota ha sido creada correctamente." enctype="multipart/form-data">
					{{csrf_field()}}
					{{method_field('POST')}}
					<div class="mb-3">
						<label for="nombre2" class="form-label">Nombre</label>
						<input id="nombre2" name="nombre" type="text" class="form-control name_valid_fsc" value="" required>
					</div>
					<div class="mb-3">
						<label for="parcial12" class="form-label">Parcial 1</label>
						<input id="parcial12" name="parcial1" type="text" class="form-control dec_valid_fsc2" value="" required>
					</div>
					<div class="mb-3">
						<label for="parcial22" class="form-label">Parcial 2</label>
						<input id="parcial22" name="parcial2" type="text" class="form-control dec_valid_fsc2" value="" required>
					</div>
					<div class="mb-3">
						<label for="parcial32" class="form-label">Parcial 3</label>
						<input id="parcial32" name="parcial3" type="text" class="form-control dec_valid_fsc2" value="" required>
					</div>
					<p class="p_final2"></p>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Agregar</button>
				</form>
		  </div>
		</div>
	  </div>
	</div>
    <!-- Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="editModalLabel">Editar nota</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
				<form class="ajax_form_fsc" action="{{url('nota')}}" method="post" data-msj="La nota ha sido guardada correctamente." enctype="multipart/form-data">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<div class="mb-3">
						<label for="nombre" class="form-label">Nombre</label>
						<input id="nombre" name="nombre" type="text" class="form-control name_valid_fsc" value="" required>
					</div>
					<div class="mb-3">
						<label for="parcial1" class="form-label">Parcial 1</label>
						<input id="parcial1" name="parcial1" type="text" class="form-control dec_valid_fsc" value="" required>
					</div>
					<div class="mb-3">
						<label for="parcial2" class="form-label">Parcial 2</label>
						<input id="parcial2" name="parcial2" type="text" class="form-control dec_valid_fsc" value="" required>
					</div>
					<div class="mb-3">
						<label for="parcial3" class="form-label">Parcial 3</label>
						<input id="parcial3" name="parcial3" type="text" class="form-control dec_valid_fsc" value="" required>
					</div>
					<p class="p_final"></p>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
		  </div>
		</div>
	  </div>
	</div>
	
	
	
	<div class="container my-5">
	<h2>Cliente API CRUD AJAX (Bootstrap 5) <a data-bs-toggle="modal" data-bs-target="#addModal" href="javascript:void(0)" class="btn btn-success btn-sm float-end"> Nueva nota</a></h2>
	<form method="post" class="delete-form-fsc d-none" data-msj="<?php echo 'La nota ha sido eliminada correctamente.'; ?>">{{csrf_field()}}{{method_field('DELETE')}}</form>
	<div class="table-responsive">
	<table id="o_table_fsc" class="table table-striped" style="width:100%" data-url="{{url('api/notas')}}">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Parcial 1</th>
                <th>Parcial 2</th>
                <th>Parcial 3</th>
                <th>Final</th>
                <th class="no-sort"></th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Parcial 1</th>
                <th>Parcial 2</th>
                <th>Parcial 3</th>
                <th>Final</th>
                <th class="no-sort"></th>
                <th class="no-sort"></th>
            </tr>
        </tfoot>
    </table>
	</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>
	<script src="{{ asset('script.js') }}"></script>
	<script>
	//calcular el promedio final
	$('.dec_valid_fsc2').on('keyup', function (e) {
		calcular_promedio2();
	});
	$('.dec_valid_fsc2').on('change', function (e) {
		calcular_promedio2();
	});
	function calcular_promedio2(){
		if($('#parcial12').val() != '' && $('#parcial22').val() != '' && $('#parcial32').val() != ''){
			var valfinal = parseFloat($('#parcial12').val()) + parseFloat($('#parcial22').val()) + parseFloat($('#parcial32').val());
			valfinal = valfinal/3;
			$('.p_final2').html('Final: '+valfinal);
		} else {
			$('.p_final2').html('');
		}
	}
	calcular_promedio2();
	
	$(document).ready( function () {
		var table_ajax = null;
		table_ajax = $('#o_table_fsc').DataTable({
			"ajax": $('#o_table_fsc').data('url'),
			"columnDefs": [{ targets: 'no-sort', orderable: false }],
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
			}
		});
		$('#o_table_fsc').on( 'xhr.dt', function(e, settings, json, xhr){
			new $.fn.dataTable.Api(settings).one('draw', function () {
				initCompleteFunction(settings, json);
			});
		});
		function initCompleteFunction(settings, json){
			var api = new $.fn.dataTable.Api(settings);
			api.$('td .btn-delete-confirm').click(function(e){
				e.preventDefault();
				var trash = $(this);
				var url_trash = trash.data('href');
				swal({
					title: 'Estás seguro(a) que deseas eliminar la nota seleccionada?',
					text: "Esta acción es irreversible!",
					type: 'error',
					showCancelButton: true,
					confirmButtonClass: 'btn btn-danger',
					confirmButtonText: 'Si, eliminar!'
				}).then(function (willConfirm) {
					if(willConfirm){
						var params = {};
						$('form.delete-form-fsc input').each(function(){
							var item = $(this);
							params[item.attr('name')] = item.val();
						});
						$.post(url_trash, params, function (data) {
							swal({
								title: 'Mensaje',
								text: data,
								type: 'success',
								confirmButtonClass: 'btn btn-success'
							});
							table_ajax.ajax.reload(null,false);
						}, "html");
					}
				},function(dismiss){});
			});
			if($('.ajax_form_fsc').length){
				$('.ajax_form_fsc').on('submit',function(e){
					e.preventDefault();
					var form_x = $(this);
					var formData = new FormData();
					var url_form_x = form_x.prop('action');
					formData.append('csrf_token_name', $("meta[name='X-CSRF-TOKEN']").attr("content"));
					form_x.find('input').each(function(i,v){
						var inp_fm = $(this);
						formData.append(inp_fm.attr('name'), inp_fm.val());
					});
					$.ajax({
						url: url_form_x,
						data: formData,
						processData: false,
						contentType: false,
						type: 'POST',
						success: function(data){
							table_ajax.ajax.reload(null,false);
							form_x[0].reset();
							form_x.parent().parent().parent().parent().modal('hide');
							swal({
								title: 'Mensaje',
								text: form_x.data('msj'),
								type: 'success',
								confirmButtonClass: 'btn btn-success'
							});
						}
					});
				});
			}
		}
		//Editar
		var editarModal = $('#editModal');
		editarModal.on('show.bs.modal', function (e) {
			var btn = $(e.relatedTarget);
			var url_action = btn.data('href');
			editarModal.find('form.ajax_form_fsc').prop('action',url_action);
			$.get(url_action, {}, function (data) {
				var obj = JSON.parse(data);
				editarModal.find('form.ajax_form_fsc .form-control').each(function(){
					var item = $(this);
					item.val(obj[item.prop('name')]);
				});
			}, "html");
		});
	});
	</script>
  </body>
</html>