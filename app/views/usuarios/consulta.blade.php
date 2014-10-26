@extends('layout.bootstrap')

@section('head')
<title>Consulta de Trabajadores</title>
@stop

@section('content')
<br/>
<div class="row">
	<div class="col-md-12">

		<div class="text-right">
			{{ HTML::linkAction('UsuariosController@getCrear', 'Agregar Nuevo Trabajador', array(), array('class' => 'btn btn-success')) }}

			{{ HTML::linkAction('CargosController@consultar', 'Cargos', array(), array('class' => 'btn btn-primary')) }}
		</div>
		
		<h2>Consulta de Trabajadores</h2><br/>
		<div class="panel panel-default">
			<div class="panel-body">
				{{ Form::open(['url' => 'usuarios', 'method' =>'post', 'class'=>'form-inline', 'role'=>'form']) }}
				<div class="form-group">
					{{ Form::text('cedula', Input::old('cedula'),
					['class'=>'form-control','placeholder'=>'Cedula']) }}
				</div>
				<div class="form-group">
					{{ Form::text('nombre', Input::old('nombre'),
					['class'=>'form-control','placeholder'=>'Nombre']) }}
				</div>
				<div class="form-group">
					{{ Form::text('apellido', Input::old('apellido'),
					['class'=>'form-control','placeholder'=>'Apellido']) }}
				</div>
				<div class="form-group">
					{{ Form::select('cargo_id', $cargos,
					Input::old('cargo_id'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::select('status', 
						array(''=>'Seleccione Status','Activo'=>'Activo','Inactivo'=>'Inactivo'),
						Input::old('status'), ['class'=>'form-control']) }}
					</div>
					<div class='form-group'>
						<!-- Form actions -->
						<button type='submit' class='btn btn-primary'>
							<span class="glyphicon glyphicon-search"></span> Consultar
						</button>
					</div>
					{{ Form::close() }}
				</div>
			</div>
			<br/>
			@if (count($usuarios)>0)
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Cédula</th>
						<th>Nombres</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Cargo</th>
						<th>Status</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					@foreach ($usuarios as $usuario)
					<tr class="@if ($usuario->status == 'Inactivo') danger @endif">
						<td>{{ HTML::linkAction('UsuariosController@getEditar',$i++,array($usuario->id)) }}</td>
						<td>{{ $usuario->cedula }}</td>
						<td>{{ $usuario->nombre }}</td>
						<td>{{ $usuario->apellido }}</td>
						<td>{{ $usuario->correo }}</td>
						<td>
							{{ $usuario->cargos->descripcion}}
						</td>
						<td>
							{{$usuario->status}}
						</td>
						<td width="5%">
							<a href='usuarios/crear/{{$usuario->id}}/editar' class='btn btn-warning' 
								title='Editar'>
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
						<td width="5%">
							<button class="btn btn-danger glyphicon glyphicon-trash confirm"
							data-toggle="modal"  href="#" data-target="#delCustomer{{$usuario->id}}" data-id="{{$usuario->id}}"></button>

							<!-- Modal -->
							<div class="modal fade" id="delCustomer{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title" id="myModalLabel">
											</p> ¿Esta seguro de eliminar {{$usuario->nombre." ".$usuario->apellido}}?
										</h4>
									</div>
									<div class="modal-body">
										Si se elimina este trabajador, todo lo relacionado con el se eliminará permanentemente del sistema.
									</div>
									<div class="modal-footer">
										<div id="delmodelcontainer" style="float:right">

											<div id="yes" style="float:left; padding-right:10px">
												{{ Form::open(array('action' => array('UsuariosController@postEliminar', $usuario->id), 'method' => 'post')) }}

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