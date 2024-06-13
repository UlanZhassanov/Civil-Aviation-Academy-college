<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnsInNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news', function (Blueprint $table) {
			$table->dropColumn('title_ru');
			$table->dropColumn('title_kk');
			$table->dropColumn('title_en');

			$table->dropColumn('desc_ru');
			$table->dropColumn('desc_kk');
			$table->dropColumn('desc_en');

			$table->dropColumn('bg_image_ru');
			$table->dropColumn('bg_image_kk');
			$table->dropColumn('bg_image_en');

			$table->longText('more_images')->change();

			$table->longText('titles')->after('department');
			$table->longText('descriptions')->after('titles');
			$table->longText('bg_images')->after('descriptions');
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
			$table->string('title_ru')->after('department');
			$table->string('title_kk')->after('title_ru');
			$table->string('title_en')->after('title_kk');

			$table->longText('desc_ru')->after('title_en')->nullable();
			$table->longText('desc_kk')->after('desc_ru')->nullable();
			$table->longText('desc_en')->after('desc_kk')->nullable();

			$table->string('bg_image_ru')->after('desc_en')->nullable();
			$table->string('bg_image_kk')->after('bg_image_ru')->nullable();
			$table->string('bg_image_en')->after('bg_image_kk')->nullable();
			
			$table->text('more_images')->change();
		});
	}
}
