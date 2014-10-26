<?php

class UsuariosController extends BaseController {
	public function index(){
		//preparo list para cargos
		$cargos = Cargos::all()->lists('descripcion', 'id');
		$combobox = array("" => "Seleccione Cargo") + $cargos;

		//armo condiciones para la consulta
		$cedula = (!empty(Input::get('cedula'))? Input::get('cedula') : '%');
		$opc = (!empty(Input::get('cedula'))? '=' : 'like');
		$nombre = (!empty(Input::get('nombre'))? '%'.Input::get('nombre').'%' : '%');
		$apellido = (!empty(Input::get('apellido'))? '%'.Input::get('apellido').'%' : '%');		
		$cargo_id = (!empty(Input::get('cargo_id'))? Input::get('cargo_id') : '%');
		$opcar = (!empty(Input::get('cargo_id'))? '=' : 'like');
		$status = (!empty(Input::get('status'))? Input::get('status') : '%');
		$ops = (!empty(Input::get('status'))? '=' : 'like');

		//me traigo objeto usuario
		$usuarios = Usuarios::where('cedula', $opc, $cedula)
		->where('nombre', 'like', $nombre)
		->where('apellido', 'like', $apellido)
		->where('cargos_id', $opcar, $cargo_id)
		->where('status', $ops, $status)
		->get();

		return View::make('usuarios.consulta',
			array('usuarios' => $usuarios,'cargos' => $combobox));

	}

	public function getCrear(){
		$cargos = Cargos::all()->lists('descripcion', 'id');
		$combobox = array("" => "Seleccione ... ") + $cargos;
		return View::make('usuarios.crear',array('cargos' => $combobox));		
	}

	public function postCrear(){
		$validator = Validator::make(Input::all(),Usuarios::rules());

		if ($validator->passes()) {
			$usuario = new Usuarios();
			$usuario->cedula = Input::get('cedula');
			$usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');
			$usuario->correo = Input::get('correo');
			$usuario->status = Input::get('status');
			$usuario->cargos_id = Input::get('cargo_id');
			$usuario->save();

			return Redirect::to('usuarios/crear')
			->with('exitoso', 'Se ha creado el usuario exitosamente.');

		}

		return Redirect::back()->withInput()->withErrors($validator->errors());
	}

	public function getEditar($id){
		$usuarios = Usuarios::find($id);
		$cargos = Cargos::all()->lists('descripcion', 'id');
		$combobox = array("" => "Seleccione ... ") + $cargos;

		return View::make('usuarios/editar', array('usuarios' => $usuarios,
			'cargos' => $combobox));
	}

	public function postEditar($id){
		$validator = Validator::make(Input::all(),Usuarios::rules($id));

		if ($validator->passes()) {
			$usuarios = Usuarios::find($id);
			$usuarios->cedula = Input::get('cedula');
			$usuarios->nombre = Input::get('nombre');
			$usuarios->apellido = Input::get('apellido');
			$usuarios->correo = Input::get('correo');
			$usuarios->cargos_id = Input::get('cargo_id');
			$usuarios->status = Input::get('status');
			$usuarios->save();

			return Redirect::to('usuarios/crear/'.$id.'/editar')
			->with('exitoso', 'Cargo modificado.')
			->withInput();
		}
		return Redirect::back()->withInput()->withErrors($validator->errors());
	}

	public function postEliminar($id){
		$usuarios = Usuarios::find($id);

		if ($usuarios){
			$usuarios->delete();

			return Redirect::to('/')
			->with('exitoso', 'Usuario eliminado.');
		} else {
			return Redirect::to('/')
			->with('error', 'El usuario que desea eliminar no existe.');
		}
	}


}
