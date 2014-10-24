@extends('layout.bootstrap')
@section('head')
<title>Editar Cargos</title>
@stop
@section('content')

<div class='container'>
	<br/>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Editar Cargo</h1><br/>
			{{ Form::open(['url' => 'cargos/crear/'.@$cargos->id, 'method' =>'post', 'class'=>'form', 'role'=>'form']) }}

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
					{{ HTML::linkAction('UsuariosController@index', 'Volver a menú principal', array(), array('class' => 'btn btn-default')) }}
					{{ HTML::linkAction('CargosController@consultar', 'Consultar Cargos', array(), array('class' => 'btn btn-primary')) }}
				</div>
				<div class='col-md-12'>
					<div class='form-group @if ($errors->has('descripcion')) has-error @endif'>
						<!-- `Descripcion` Field -->
						{{ Form::label('descripcion', 'Descripcion') }}
						{{ Form::text('descripcion', @$cargos->descripcion, ['class'=>'form-control']) }}
						@if ($errors->has('descripcion'))
						<p class="help-block">{{ $errors->first('descripcion') }}</p>
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