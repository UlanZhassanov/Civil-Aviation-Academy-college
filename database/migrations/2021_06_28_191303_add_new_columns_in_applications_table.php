<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInApplicationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('applications', function (Blueprint $table) {
			$table->string('haveVLEK')->after('programms')->nullable();
			$table->string('imgVLEK')->after('haveVLEK')->nullable();
			$table->string('haveIELTS')->after('imgVLEK')->nullable();
			$table->string('imgIELTS')->after('haveIELTS')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('applications', function (Blueprint $table) {
			$table->dropColumn('haveVLEK');
			$table->dropColumn('imgVLEK');
			$table->dropColumn('haveIELTS');
			$table->dropColumn('imgIELTS');
		});
	}
}
