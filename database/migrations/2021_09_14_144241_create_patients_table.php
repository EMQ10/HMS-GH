<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->char('gender');
            $table->string('marital_status');
            $table->date('dob');
            $table->string('occupation')->nullable();
            $table->string('email')->references('email')->on('users')->onUpdate('restrict')->onDelete('restrict')->unique();
            $table->string('phone_number')->unique();
            $table->string('emergency_number')->unique()->nullable();
            $table->string('address');
            $table->string('registration_number');
            $table->string('nationality');
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
        Schema::dropIfExists('patients');
    }
}
