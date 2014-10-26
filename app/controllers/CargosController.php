<?php

class CargosController extends BaseController {
	public function consultar(){
		$cargos = Cargos::all();
		return View::make('cargos.consulta', array('cargos' => $cargos));
	}

	public function getCrear(){
		return View::make('cargos.crear');
	}

	public function postCrear(){
		$validator = Validator::make(Input::all(),Cargos::$rules);

		if ($validator->passes()) {
			$cargos = new Cargos();
			$cargos->descripcion = Input::get('descripcion');
			$cargos->save();

			return Redirect::to('cargos/crear')
			->with('exitoso', 'Se ha creado el nuevo cargo exitosamente.');
		}
		return Redirect::back()->withInput()->withErrors($validator->errors());

	}

	public function getEditar($id){
		$cargos = Cargos::find($id);
		return View::make('cargos/editar', array('cargos' => $cargos));
	}

	public function postEditar($id){
		$validator = Validator::make(Input::all(),Cargos::$rules);

		if ($validator->passes()) {
			$cargos = Cargos::find($id);
			$cargos->descripcion = Input::get('descripcion');
			$cargos->save();

			return Redirect::to('cargos/crear/'.$id.'/editar')
			->with('exitoso', 'Cargo modificado.')
			->withInput();
		}
		return Redirect::back()->withInput()->withErrors($validator->errors());

	}

	public function getEliminar($id){
		$cargos = Cargos::find($id);
		return View::make('cargos/consulta', array('cargo' => $cargos))
		->with('activar', 1);
	}

	public function postEliminar($id){
		$cargos = Cargos::find($id);

		if ($cargos){
			$cargos->delete();

			return Redirect::to('cargos')
			->with('exitoso', 'Cargo eliminado.')
			->withInput();
		} else {
			return Redirect::to('cargos')
			->with('error', 'El cargo que desea eliminar no existe.')
			->withInput();
		}
	}
}