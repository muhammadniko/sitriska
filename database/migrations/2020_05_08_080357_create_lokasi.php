<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_Lokasi', function (Blueprint $table) {
            $table->string('kode_pos', 8)->primary();
            $table->string('user_id', 4);
            $table->string('kelurahan', 32);
            $table->string('kecamatan', 32);
            $table->string('latitude', 32);
            $table->string('langitude', 32);
            $table->string('luas_area', 32);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_Lokasi');
    }
}
