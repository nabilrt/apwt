<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_db.doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_email')->unique();
            $table->string('doctor_phone')->unique();
            $table->string('doctor_username')->unique();
            $table->string('doctor_pass');
            $table->string('doctor_gender');
            $table->string('doctor_dob');
            $table->string('doctor_dp');
            $table->string('doctor_degree');
            $table->string('doctor_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
