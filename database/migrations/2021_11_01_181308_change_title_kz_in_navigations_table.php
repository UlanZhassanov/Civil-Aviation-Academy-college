<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTitleKzInNavigationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('navigations', function (Blueprint $table) {
			$table->renameColumn('title_kz', 'title_kk');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('navigations', function (Blueprint $table) {
			$table->renameColumn('title_kk', 'title_kz');
		});
	}
}
