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
        Schema::create('testResult', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datapokok_id');
            $table->string('matematika');
            $table->string('ilmu_pengetahuan_alam');
            $table->string('bahasa_indonesia');
            $table->string('test_membaca_al_quran');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('testResult');
    }
};
