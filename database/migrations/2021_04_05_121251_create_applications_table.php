<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();	
				$table->string('type');
				$table->string('base')->nullable();
            $table->string('citizen')->nullable();
            $table->string('haveENT')->nullable();
            $table->string('quantENT')->nullable();
            $table->string('mathLit')->nullable();
            $table->string('readLit')->nullable();
            $table->string('historyKZ')->nullable();
            $table->string('math')->nullable();
            $table->string('profSub')->nullable();
            $table->string('aviaSec')->nullable();
            $table->string('natureSec')->nullable();
            $table->string('geography')->nullable();
            $table->string('physics')->nullable();
            $table->string('countries')->nullable();
            $table->string('programms')->nullable();
            $table->string('region')->nullable();
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
