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
        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->date('pendaftaran_akun_ppdb_start')->nullable();
            $table->date('pendaftaran_akun_ppdb_due')->nullable();
            $table->date('pengumpulan_berkas_start')->nullable();
            $table->date('pengumpulan_berkas_due')->nullable();
            $table->date('test_akademik_start')->nullable();
            $table->date('test_akademik_due')->nullable();
            $table->date('test_baca_al_quran_start')->nullable();
            $table->date('test_baca_al_quran_due')->nullable();
            $table->date('test_wawancara_start')->nullable();
            $table->date('test_wawancara_due')->nullable();
            $table->date('pendaftaran_ulang_start')->nullable();
            $table->date('pendaftaran_ulang_due')->nullable();
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
        Schema::dropIfExists('config');
    }
};
