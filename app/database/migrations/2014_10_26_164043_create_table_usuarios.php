<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cedula')->unique()->unsigned();
			$table->string('nombre', 60);
			$table->string('apellido', 60);
			$table->string('correo', 200);
			$table->enum('status', array('Inactivo','Activo'));
			$table->integer('cargos_id')->unsigned();			
			$table->foreign('cargos_id')->references('id')->on('cargos');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
