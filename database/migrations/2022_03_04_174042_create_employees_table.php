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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('title_id');
            $table->foreignId('group_id');
            $table->foreignId('nip')->unique();
            $table->string('join_date');
            $table->string('birth_date');
            $table->foreignId('nik')->unique();
            $table->string('npwp')->unique()->nullable();
            $table->string('nuptk')->unique()->nullable();
            $table->foreignId('gender_id');
            $table->string('religion');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->foreignId('education_id_1');
            $table->foreignId('education_id_2')->nullable();
            $table->foreignId('field_area_id_1');
            $table->foreignId('field_area_id_2')->nullable();
            $table->foreignId('certification_id_1')->nullable();
            $table->foreignId('certification_id_2')->nullable();
            $table->foreignId('certification_id_3')->nullable();
            $table->foreignId('institution_1')->nullable();
            $table->foreignId('institution_2')->nullable();
            $table->foreignId('institution_3')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
