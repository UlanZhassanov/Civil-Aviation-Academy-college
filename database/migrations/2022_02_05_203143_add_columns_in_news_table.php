<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPSTORM_META\type;

class AddColumnsInNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news', function (Blueprint $table) {
			$table->unsignedBigInteger('user_id')->after('id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->dropColumn('active');
			$table->boolean('agree')->after('user_id')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('news', function (Blueprint $table) {
			$table->dropForeign(['user_id']);
			$table->dropColumn('user_id');

			$table->boolean('active')->default(true);
			$table->dropColumn('agree');
		});
	}
}
