<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_Score', function (Blueprint $table) {
            $table->increments('kode_skor');
            $table->integer('kode_lokasi');
            $table->string('tingkat_risiko', 32);
            $table->string('skor_ancaman', 2);
            $table->string('skor_kerentanan', 2);
            $table->string('skor_ketahanan', 2);
            $table->string('listrik', 64);
            $table->string('kompor', 64);
            $table->string('kepadatan_penduduk', 64);
            $table->string('kepadatan_bangunan', 64);
            $table->string('ukuran_bangunan', 64);
            $table->string('jarak_bangunan', 64);
            $table->string('konstruksi', 64);
            $table->string('lebar_jalan', 64);
            $table->string('jarak_bpk', 64);
            $table->string('hidran', 64);
            $table->string('tandon_air', 64);
            $table->string('sumber_air', 64);
            $table->string('skor_akhir', 64);
            $table->string('tgl_entry', 64);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_Score');
    }
}
