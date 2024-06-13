<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersInfosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workers_infos', function (Blueprint $table) {			
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('department');
			$table->string('position');
			$table->char('surname', 30);
			$table->char('name', 30);
			$table->char('patronymic', 30)->nullable()->default(null);
			$table->bigInteger('phone');
			$table->char('email', 50);
			$table->timestamp('email_verifed')->nullable();
			$table->boolean('working')->default(1);
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
		Schema::dropIfExists('workers_infos');
	}
}
