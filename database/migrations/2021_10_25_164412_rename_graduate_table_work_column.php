<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGraduateTableWorkColumn extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graduates', function (Blueprint $table) {
			$table->renameColumn('work', 'work_place');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('graduates', function (Blueprint $table) {
			$table->renameColumn('work_place', 'work');
		});
	}
}
