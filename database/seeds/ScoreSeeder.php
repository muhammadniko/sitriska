<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('T_Score')->insert([
            ['kode_skor' => '3','kode_lokasi' => '4','tingkat_risiko' => 'Tinggi','skor_ancaman' => '11','skor_kerentanan' => '42','skor_ketahanan' => '8','listrik' => '9','kompor' => '2','kepadatan_penduduk' => '9','kepadatan_bangunan' => '9','ukuran_bangunan' => '2','jarak_bangunan' => '6','konstruksi' => '6','lebar_jalan' => '9','jarak_bpk' => '1','hidran' => '3','tandon_air' => '2','sumber_air' => '3','skor_akhir' => '57.75','tgl_entry' => '19/06/2020'],
            ['kode_skor' => '4','kode_lokasi' => '5','tingkat_risiko' => 'Sedang','skor_ancaman' => '11','skor_kerentanan' => '26','skor_ketahanan' => '12','listrik' => '9','kompor' => '2','kepadatan_penduduk' => '3','kepadatan_bangunan' => '6','ukuran_bangunan' => '2','jarak_bangunan' => '4','konstruksi' => '3','lebar_jalan' => '6','jarak_bpk' => '2','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '23.83','tgl_entry' => '19/06/2020'],
            ['kode_skor' => '5','kode_lokasi' => '6','tingkat_risiko' => 'Sedang','skor_ancaman' => '11','skor_kerentanan' => '35','skor_ketahanan' => '12','listrik' => '9','kompor' => '2','kepadatan_penduduk' => '6','kepadatan_bangunan' => '9','ukuran_bangunan' => '1','jarak_bangunan' => '6','konstruksi' => '6','lebar_jalan' => '6','jarak_bpk' => '1','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '32.08','tgl_entry' => '19/06/2020'],
            ['kode_skor' => '6','kode_lokasi' => '10','tingkat_risiko' => 'Rendah','skor_ancaman' => '5','skor_kerentanan' => '29','skor_ketahanan' => '12','listrik' => '3','kompor' => '2','kepadatan_penduduk' => '3','kepadatan_bangunan' => '6','ukuran_bangunan' => '2','jarak_bangunan' => '4','konstruksi' => '3','lebar_jalan' => '9','jarak_bpk' => '2','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '12.08','tgl_entry' => '19/06/2020'],
            ['kode_skor' => '7','kode_lokasi' => '7','tingkat_risiko' => 'Sedang','skor_ancaman' => '11','skor_kerentanan' => '35','skor_ketahanan' => '12','listrik' => '9','kompor' => '2','kepadatan_penduduk' => '6','kepadatan_bangunan' => '9','ukuran_bangunan' => '1','jarak_bangunan' => '6','konstruksi' => '6','lebar_jalan' => '6','jarak_bpk' => '1','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '32.08','tgl_entry' => '19/06/2020'],
            ['kode_skor' => '8','kode_lokasi' => '8','tingkat_risiko' => 'Rendah','skor_ancaman' => '5','skor_kerentanan' => '25','skor_ketahanan' => '12','listrik' => '3','kompor' => '2','kepadatan_penduduk' => '3','kepadatan_bangunan' => '3','ukuran_bangunan' => '1','jarak_bangunan' => '4','konstruksi' => '6','lebar_jalan' => '6','jarak_bpk' => '2','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '10.42','tgl_entry' => '19/06/2020'],
            ['kode_skor' => '9','kode_lokasi' => '12','tingkat_risiko' => 'Tinggi','skor_ancaman' => '11','skor_kerentanan' => '41','skor_ketahanan' => '12','listrik' => '9','kompor' => '2','kepadatan_penduduk' => '9','kepadatan_bangunan' => '9','ukuran_bangunan' => '1','jarak_bangunan' => '6','konstruksi' => '6','lebar_jalan' => '9','jarak_bpk' => '1','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '37.58','tgl_entry' => '21/07/2020'],
            ['kode_skor' => '10','kode_lokasi' => '13','tingkat_risiko' => 'Tinggi','skor_ancaman' => '11','skor_kerentanan' => '41','skor_ketahanan' => '12','listrik' => '9','kompor' => '2','kepadatan_penduduk' => '9','kepadatan_bangunan' => '9','ukuran_bangunan' => '3','jarak_bangunan' => '6','konstruksi' => '6','lebar_jalan' => '6','jarak_bpk' => '2','hidran' => '9','tandon_air' => '2','sumber_air' => '1','skor_akhir' => '37.58','tgl_entry' => '23/07/2020'],
        ]);
    }
}
