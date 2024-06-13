<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigations', function (Blueprint $table) {
			$table->id();
			$table->string('title_ru');
			$table->string('title_kz')->nullable()->default(NULL);
			$table->string('title_en')->nullable()->default(NULL);
			$table->string('link')->nullable()->default(NULL);
			$table->integer('sort')->default(1);
			$table->integer('parrent_id')->nullable()->default(NULL);
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
		Schema::dropIfExists('navigations');
	}
}
