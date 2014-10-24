<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCargosusuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cargosusuarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('usuario_id')->unsigned()->unique();
			$table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
			$table->integer('cargo_id')->unsigned();
			$table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
			$table->enum('status', array('Inactivo','Activo'));
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
		Schema::drop('cargosusuarios');
	}

}
