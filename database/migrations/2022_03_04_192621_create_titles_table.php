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
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique;
            $table->string('slug')->unique;
            // $table->string('authorization');
            $table->boolean('disable');
            $table->boolean('view');
            $table->boolean('add');
            $table->boolean('edit');
            $table->boolean('delete');
            $table->boolean('download');
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
        Schema::dropIfExists('titles');
    }
};
