@extends('layout.bootstrap')

@section('head')
<title>Cargos</title>
@stop

@section('content')
<br/>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2>Consulta de Cargos</h2><br/>

		<div class="text-right">
			{{ HTML::linkAction('UsuariosController@index', 'Volver a menú principal', array(), array('class' => 'btn btn-primary')) }}
			{{ HTML::linkAction('CargosController@getCrear', 'Agregar Nuevo', array(), array('class' => 'btn btn-success')) }}
		</div>
		<br/>
		@if (count($cargos)>0)

		@if(Session::has('exitoso'))
		<div role='alert' class='alert alert-success'>
			{{ Session::get('exitoso') }}
		</div>
		@endif

		@if(Session::has('error'))
		<div role='alert' class='alert alert-danger'>
			{{ Session::get('error') }}
		</div>
		@endif

		<div class="row">
			<div class="col-md-12">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Cargo</th>
							<th width="5%"></th>
							<th width="5%"></th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach ($cargos as $cargo) 
						<tr>
							<td>
								{{ HTML::linkAction('CargosController@getEditar',$i++,array($cargo->id)) }}
							</td>
							<td>{{ $cargo->descripcion }}</td>
							<td>
								<a href='cargos/crear/{{$cargo->id}}/editar' class='btn btn-warning'
									title='Editar'>
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
							</td>
							<td>
								<button class="btn btn-danger glyphicon glyphicon-trash confirm"
								data-toggle="modal"  href="#" data-target="#delCustomer{{$cargo->id}}" data-id="{{$cargo->id}}"></button>

								<!-- Modal -->
								<div class="modal fade" id="delCustomer{{$cargo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h4 class="modal-title" id="myModalLabel">
												</p> ¿Esta seguro de eliminar {{$cargo->descripcion}}?
											</h4>
										</div>
										<div class="modal-body">
											Si se elimina este cargo, todo lo relacionado con el se eliminará permanentemente del sistema.
										</div>
										<div class="modal-footer">
											<div id="delmodelcontainer" style="float:right">

												<div id="yes" style="float:left; padding-right:10px">
													{{ Form::open(array('action' => array('CargosController@postEliminar', $cargo->id), 'method' => 'post')) }}

													{{Form::submit('Si', array('class' => 'btn btn-primary'))}}

													{{ Form::close() }}
												</div> <!-- end yes -->  

												<div id="no" style="float:left;"> 
													<button type="button" class="btn btn-default" data-dismiss="modal">No</button>    
												</div><!-- end no -->

											</div> <!-- end delmodelcontainer -->

										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@else
	<br/>
	<div class="alert alert-warning" role="alert">
		No Existe información
	</div>
	@endif

</div>
</div>


@stop

@section('footer')
<script>
$(document).ready(function(){
	$('.confirm').click(function(event){
		event.preventDefault();
		var id = $(this).data('id');
		$(".modal-header #id").val(id);
	});
});
</script>
@stop