<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('identity_number');
            $table->string('name');
            $table->char('gender', 1);
            $table->date('date_of_birth');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('photo');
            $table->string('cv');
            $table->string('last_education');
            $table->string('gpa');
            $table->integer('work_experience_in_years');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_details');
    }
}
