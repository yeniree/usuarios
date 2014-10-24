@extends('layout.bootstrap')

@section('head')
<title>Crear nuevo trabajador</title>
@stop

@section('content')

<div class='container'>
	<br/>
	<h1>Nuevo Trabajador</h1><br/>
	{{ Form::open(['url' => 'usuarios/crear', 'method' =>'post', 'class'=>'form', 'role'=>'form']) }}
	
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
		<div class="col-md-12 text-right">
			{{ HTML::linkAction('UsuariosController@index', 'Volver a menú principal', array(), array('class' => 'btn btn-primary')) }}
		</div>
		<div class='col-md-12'>
			<div class='form-group @if ($errors->has('cedula')) has-error @endif'>
				<!-- `Cedula` Field -->
				{{ Form::label('cedula', 'Cédula') }}
				{{ Form::text('cedula', Input::old('cedula'), ['class'=>'form-control']) }}
				@if ($errors->has('cedula'))
					<p class="help-block">{{ $errors->first('cedula') }}</p>
				@endif
			</div>
			<div class='form-group @if ($errors->has('nombre')) has-error @endif'>
				<!-- `Nombre` Field -->
				{{ Form::label('nombre', 'Nombre') }}
				{{ Form::text('nombre', Input::old('nombre'), ['class'=>'form-control']) }}
				@if ($errors->has('nombre'))
					<p class="help-block">{{ $errors->first('nombre') }}</p>
				@endif
			</div>
			<div class='form-group @if ($errors->has('apellido')) has-error @endif'>
				<!-- `Apellido` Field -->
				{{ Form::label('apellido', 'Apellido') }}
				{{ Form::text('apellido', Input::old('apellido'), ['class'=>'form-control']) }}
				@if ($errors->has('apellido'))
					<p class="help-block">{{ $errors->first('apellido') }}</p>
				@endif
			</div>
			<div class='form-group @if ($errors->has('correo')) has-error @endif'>
				<!-- `Correo` Field -->
				{{ Form::label('correo', 'Correo') }}
				{{ Form::text('correo', Input::old('correo'), ['class'=>'form-control']) }}
				@if ($errors->has('correo'))
					<p class="help-block">{{ $errors->first('correo') }}</p>
				@endif
			</div>
			<div class='form-group @if ($errors->has('cargo_id')) has-error @endif'>
				{{ Form::label('cargo_id', 'Cargo') }}
				{{ Form::select('cargo_id', $cargos,
				 Input::old('cargo_id'), ['class'=>'form-control']) }}
				@if ($errors->has('cargo_id'))
					<p class="help-block">{{ $errors->first('cargo_id') }}</p>
				@endif
			</div>
			<div class='form-group @if ($errors->has('status')) has-error @endif'>
				{{ Form::label('status', 'Status') }}
				{{ Form::select('status', array('Activo'=>'Activo','Inactivo'=>'Inactivo'),
				 Input::old('status'), ['class'=>'form-control']) }}
				@if ($errors->has('status'))
					<p class="help-block">{{ $errors->first('status') }}</p>
				@endif
			</div>
		</div>
		<div class='col-md-12 text-right'>
			<!-- Form actions -->
			<a href='{{URL::previous()}}' class='btn btn-default'>Cancelar</a>
			<button type='submit' class='btn btn-success'>Crear</button>
		</div>
	</div>
	{{ Form::close() }}
</div>
@stop