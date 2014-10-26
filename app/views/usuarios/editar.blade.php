@extends('layout.bootstrap')
@section('head')
<title>Editar Cargos</title>
@stop
@section('content')

<div class='container'>
	<br/>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Editar Usuario</h1><br/>
			{{ Form::open(['url' => 'usuarios/crear/'.@$usuarios->id, 'method' =>'post', 'class'=>'form', 'role'=>'form']) }}

			@if(Session::has('exitoso'))
			<div role='alert' class='alert alert-success'>
				{{ Session::get('exitoso') }}
			</div>
			@endif

			@if(count(@$errors)>0)
			<div role='alert' class='alert alert-danger'>
				Por favor, verifique el formulario.
			</div>
			@endif
			<div class='row'>
				<div class='col-md-12'>
					<div class="col-md-12 text-right">
						{{ HTML::linkAction('UsuariosController@index', 'Volver a menú principal', array(), array('class' => 'btn btn-primary')) }}
					</div>
					<div class='form-group @if ($errors->has('cedula')) has-error @endif'>
						<!-- `Cedula` Field -->
						{{ Form::label('cedula', 'Cédula') }}
						{{ Form::text('cedula', @$usuarios->cedula, ['class'=>'form-control']) }}
						@if ($errors->has('cedula'))
						<p class="help-block">{{ $errors->first('cedula') }}</p>
						@endif
					</div>
					<div class='form-group @if ($errors->has('nombre')) has-error @endif'>
						<!-- `Nombre` Field -->
						{{ Form::label('nombre', 'Nombre') }}
						{{ Form::text('nombre', @$usuarios->nombre, ['class'=>'form-control']) }}
						@if ($errors->has('nombre'))
						<p class="help-block">{{ $errors->first('cedula') }}</p>
						@endif
					</div>
					<div class='form-group @if ($errors->has('apellido')) has-error @endif'>
						<!-- `Apellido` Field -->
						{{ Form::label('apellido', 'Apellido') }}
						{{ Form::text('apellido', @$usuarios->apellido, ['class'=>'form-control']) }}
						@if ($errors->has('apellido'))
						<p class="help-block">{{ $errors->first('cedula') }}</p>
						@endif
					</div>
					<div class='form-group @if ($errors->has('correo')) has-error @endif'>
						<!-- `Correo` Field -->
						{{ Form::label('correo', 'Correo') }}
						{{ Form::text('correo', @$usuarios->correo, ['class'=>'form-control']) }}
						@if ($errors->has('correo'))
						<p class="help-block">{{ $errors->first('correo') }}</p>
						@endif
					</div>
					<div class='form-group @if ($errors->has('cargo')) has-error @endif'>
						<!-- `Cargo` Field -->
						{{ Form::label('cargo', 'Cargo') }}
						{{ Form::select('cargo_id', $cargos,
							$usuarios->cargos_id,
						 ['class'=>'form-control']) }}
						@if ($errors->has('cargo'))
						<p class="help-block">{{ $errors->first('cargo') }}</p>
						@endif
					</div>
					<div class='form-group @if ($errors->has('status')) has-error @endif'>
						<!-- `Staus` Field -->
						{{ Form::label('status', 'Status') }}
						{{ Form::select('status', array('Activo'=>'Activo','Inactivo'=>'Inactivo'),
						$usuarios->status, ['class'=>'form-control']) }}
						@if ($errors->has('status'))
						<p class="help-block">{{ $errors->first('status') }}</p>
						@endif
					</div>
				</div>
				<div class='col-md-12 text-right'>
					<!-- Form actions -->
					<a href='{{URL::previous()}}' class='btn btn-default'>Cancelar</a>
					<button type='submit' class='btn btn-success'>Actualizar</button>
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop