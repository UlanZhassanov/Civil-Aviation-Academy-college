<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
				$table->string('title_ru')->nullable();
				$table->string('title_kz')->nullable();
				$table->string('title_en')->nullable();
				$table->text('desc_ru')->nullable();
				$table->text('desc_kz')->nullable();
				$table->text('desc_en')->nullable();
				$table->string('bg_image_ru')->nullable();
				$table->string('bg_image_kz')->nullable();
				$table->string('bg_image_en')->nullable();
				$table->string('slug')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
