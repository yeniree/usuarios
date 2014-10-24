@extends('layout.bootstrap')
@section('head')
<title>Crear nuevo cargo</title>
@stop
@section('content')

<div class='container'>
	<br/>
	<h1>Nuevo Cargo</h1><br/>
	{{ Form::open(['url' => 'cargos/crear', 'method' =>'post', 'class'=>'form', 'role'=>'form']) }}

	@if(Session::has('exitoso'))
	<div role='alert' class='alert alert-success'>
		{{ Session::get('exitoso') }}
	</div>
	@endif

	@if(count(@$errors)>0)
	<div role='alert' class='alert alert-danger'>
		Por favor, complete el formulario.
	</div>
	@endif

	
	<div class='row'>
		<div class="col-md-12 text-right">
			{{ HTML::linkAction('UsuariosController@index', 'Volver a menú principal', array(), array('class' => 'btn btn-primary')) }}
		</div>
		<div class='col-md-12'>
			<br/>
			<div class='form-group @if ($errors->has('descripcion')) has-error @endif'>
				<!-- `Descripcion` Field -->
				{{ Form::label('descripcion', 'Descripción') }}
				{{ Form::text('descripcion', Input::old('descripcion'), ['class'=>'form-control']) }}
				@if ($errors->has('descripcion'))
					<p class="help-block">{{ $errors->first('descripcion') }}</p>
				@endif
			</div>
		</div>
		
		<div class='col-md-12 text-right'>
			<!-- Form actions -->
			<a href='{{URL::previous()}}' class='btn btn-default'>Cancelar</a>
			<button type='submit' class='btn btn-success'>Guardar</button>
		</div>
	</div>
	{{ Form::close() }}
</div>
@stop