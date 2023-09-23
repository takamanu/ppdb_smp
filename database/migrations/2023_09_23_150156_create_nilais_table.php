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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->enum('matematika',['A,B,C,D,E']);
            $table->enum('ilmu_pengetahuan_alam',['A,B,C,D,E']);
            $table->enum('bahasa_indonesia',['A,B,C,D,E']);
            $table->enum('test_membaca_al_quran',['A,B,C,D,E']);
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
        Schema::dropIfExists('nilais');
    }
};
