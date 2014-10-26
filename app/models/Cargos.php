	<?php

class Cargos extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cargos';

	public function usuarios()
    {
         return $this->hasMany('Usuarios');
    }

	public static $rules = array(
		'descripcion'=>'required|unique:cargos,descripcion'
		);

}