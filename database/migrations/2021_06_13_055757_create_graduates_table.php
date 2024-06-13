<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('graduates', function (Blueprint $table) {
			$table->id();
			$table->string('groupe')->nullable();
			$table->string('form_study')->nullable();
			$table->string('iin');
			$table->unique('iin', 'iin_unique');
			$table->text('reg_address')->nullable();
			$table->text('res_address')->nullable();
			$table->string('region')->nullable();
			$table->string('speciality')->nullable();
			$table->string('phone')->nullable();
			$table->boolean('magister')->default(0);
			$table->string('work')->nullable();
			$table->boolean('reference')->default(0);
			$table->boolean('resume')->default(0);
			$table->boolean('direction')->default(0);
			$table->string('process')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('graduates');
	}
}
