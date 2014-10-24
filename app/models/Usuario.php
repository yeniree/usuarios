<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	public function users() { 
		return $this->belongsToMany('Usuario', 'CargosUsuarios')->withPivot('status');
	}
	
	public function cargosusuarios()
	{
		return $this->hasMany('CargosUsuarios');
	}

	public function cargouser() {
		return $this->belongsToMany('Cargo','CargosUsuarios')->withPivot('status');
	}
	
	public static function rules($id="",$merge=[]){
		return array_merge(
			[
			'cedula' => 'required|min:7|numeric|unique:usuarios,cedula,'.$id,
			'nombre' => 'required|min:3',
			'apellido' => 'required|min:3',
			'correo' => 'required|email|unique:usuarios,correo,'.$id,
			'cargo_id'=>'required',
			'status'=>'required'
			],$merge);
	}
}
