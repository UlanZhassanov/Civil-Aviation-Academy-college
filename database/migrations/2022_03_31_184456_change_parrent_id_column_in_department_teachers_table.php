<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParrentIdColumnInDepartmentTeachersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('department_teachers', function (Blueprint $table) {
			$table->renameColumn('parrent_id', 'department_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('department_teachers', function (Blueprint $table) {
			$table->renameColumn('department_id', 'parrent_id');
		});
	}
}
