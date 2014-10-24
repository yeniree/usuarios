<?php

class CargosUsuarios extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cargosusuarios';

	public function usuarios()
    {
        return $this->belongsTo('Usuario','usuario_id');
    }

	public static $rules = array(
		'usuario_id'=>'required|unique:usuarios,id',
		'cargo_id'=>'required|unique:cargos,id',
		'status'=>'required|string'
		);

}