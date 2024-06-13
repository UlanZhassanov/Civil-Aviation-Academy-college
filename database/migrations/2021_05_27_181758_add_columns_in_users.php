<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInUsers extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('iin_or_passport_number')->after('id')->nullable();
			$table->string('family')->after('iin_or_passport_number')->nullable();
			$table->string('patronimyc')->after('name')->nullable();
			$table->string('role')->after('patronimyc')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('iin_or_passport_number');
			$table->dropColumn('family');
			$table->dropColumn('patronimyc');
			$table->dropColumn('role');
		});
	}
}
