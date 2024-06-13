<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGraduateTableWorkColumn extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('graduates', function (Blueprint $table) {
			$table->boolean('work')->nullable()->default(NULL)->after('magister');
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
			$table->dropColumn('work');
		});
	}
}
