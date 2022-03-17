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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('nisn')->unique();
            $table->foreignId('nis')->unique();
            $table->string('year_enrolled');
            $table->string('year_graduated')->nullable();
            $table->string('status');
            $table->foreignId('nik')->unique();
            $table->string('birth_date');
            $table->string('address');
            $table->foreignId('gender_id');
            $table->string('religion');
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('father_occupation');
            $table->string('father_income');
            $table->string('mother_name');
            $table->string('mother_phone');
            $table->string('mother_occupation');
            $table->string('mother_income');
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relationship')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_income')->nullable();
            $table->string('kindergarten')->nullable();
            $table->string('elementary')->nullable();
            $table->string('juniorhs')->nullable();
            $table->string('unit');
            $table->foreignId('year_id');
            $table->foreignId('classroom_id');

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
        Schema::dropIfExists('students');
    }
};
