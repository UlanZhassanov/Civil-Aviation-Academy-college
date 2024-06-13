<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsInUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('family');
			$table->dropColumn('name');
			$table->dropColumn('patronimyc');
			$table->dropColumn('role');
			$table->dropColumn('email');
			$table->dropColumn('email_verified_at');
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
			$table->string('family')->after('iin_or_passport_number')->nullable();
			$table->string('name')->after('family');
			$table->string('patronimyc')->after('name')->nullable();
			$table->string('role')->after('patronimyc')->nullable();
			$table->string('email')->after('role');
			$table->timestamp('email_verified_at')->after('email')->nullable();
		});
	}
}
