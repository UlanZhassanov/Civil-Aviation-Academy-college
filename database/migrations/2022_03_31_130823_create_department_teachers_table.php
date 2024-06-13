<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTeachersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('department_teachers', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('parrent_id');
			$table->foreign('parrent_id')->references('id')->on('departments')->onDelete('cascade');
			$table->boolean('status')->default(true);
			$table->char('surname', 100);
			$table->char('name', 100);
			$table->char('patronymic', 100)->nullable();
			$table->char('position', 100)->nullable();
			$table->string('photo')->nullable();
			$table->char('phone', 10)->nullable();
			$table->string('email')->nullable();
			$table->longText('information');
			$table->string('slug')->unique();
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
		Schema::dropIfExists('department_teachers');
	}
}
