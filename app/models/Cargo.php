<?php

class Cargo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cargos';

	public function users()
    {
         return $this->belongsToMany('Usuario', 'CargosUsuarios')->withPivot('status');
    }

	public static $rules = array(
		'descripcion'=>'required|unique:cargos,descripcion'
		);

}