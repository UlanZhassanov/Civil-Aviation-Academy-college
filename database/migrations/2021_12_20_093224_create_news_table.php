<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function (Blueprint $table) {
			$table->id();
			$table->string('category');
			$table->boolean('active')->default(1);
			$table->string('title_ru');
			$table->string('title_kk');
			$table->string('title_en');
			$table->longText('desc_ru')->nullable();
			$table->longText('desc_kk')->nullable();
			$table->longText('desc_en')->nullable();
			$table->string('bg_image_ru')->nullable();
			$table->string('bg_image_kk')->nullable();
			$table->string('bg_image_en')->nullable();
			$table->text('more_images')->nullable();
			$table->string('slug');
			$table->timestamp('publish_at');
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
		Schema::dropIfExists('news');
	}
}
