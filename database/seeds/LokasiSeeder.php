<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('T_Lokasi')->insert([
            ['kode_lokasi' => '1','kode_pos' => '70127','user_id' => '1','kelurahan' => 'Kuin Utara','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.2905995751383426','langitude' => '114.57538342230451','luas_area' => '1.64'],
            ['kode_lokasi' => '2','kode_pos' => '70123','user_id' => '1','kelurahan' => 'Sungai Miai','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.2944726105429','langitude' => '114.59395650793458','luas_area' => '1.72'],
            ['kode_lokasi' => '3','kode_pos' => '70121','user_id' => '1','kelurahan' => 'Sungai Jingah','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.2840440475693784','langitude' => '114.61000806120505','luas_area' => '4.6'],
            ['kode_lokasi' => '4','kode_pos' => '70126','user_id' => '1','kelurahan' => 'Alalak Selatan','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.285233258080109','langitude' => '114.57193215469269','luas_area' => '1.23'],
            ['kode_lokasi' => '5','kode_pos' => '70122','user_id' => '1','kelurahan' => 'Sungai Andai','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.29104810127565','langitude' => '114.60733125742806','luas_area' => '6.45'],
            ['kode_lokasi' => '6','kode_pos' => '70242','user_id' => '1','kelurahan' => 'Kelayan Tengah','kecamatan' => 'Banjarmasin Selatan','latitude' => '-3.3348631763082364','langitude' => '114.59301010225299','luas_area' => '0.19'],
            ['kode_lokasi' => '7','kode_pos' => '70243','user_id' => '1','kelurahan' => 'Pekauman','kecamatan' => 'Banjarmasin Selatan','latitude' => '-3.3331148864023272','langitude' => '114.58984409011602','luas_area' => '0.36'],
            ['kode_lokasi' => '8','kode_pos' => '70113','user_id' => '1','kelurahan' => 'Teluk Tiram','kecamatan' => 'Banjarmasin Barat','latitude' => '-3.33956900879652','langitude' => '114.58165447819567','luas_area' => '0.57'],
            ['kode_lokasi' => '9','kode_pos' => '70245','user_id' => '1','kelurahan' => 'Basirih','kecamatan' => 'Banjarmasin Barat','latitude' => '-3.3398999035255015','langitude' => '114.56580404211427','luas_area' => '3.65'],
            ['kode_lokasi' => '10','kode_pos' => '70246','user_id' => '1','kelurahan' => 'Pemurus Baru','kecamatan' => 'Banjarmasin Selatan','latitude' => '-3.339450900775575','langitude' => '114.61058025020935','luas_area' => '1.42'],
            ['kode_lokasi' => '11','kode_pos' => '70111','user_id' => '1','kelurahan' => 'Sungai Baru','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.304155402511513','langitude' => '114.59799055029298','luas_area' => '2.1'],
            ['kode_lokasi' => '12','kode_pos' => '70126','user_id' => '1','kelurahan' => 'Alalak Tengah','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.2742373833460836','langitude' => '114.56967354664853','luas_area' => '0.92'],
            ['kode_lokasi' => '13','kode_pos' => '70125','user_id' => '1','kelurahan' => 'Alalak Utara','kecamatan' => 'Banjarmasin Utara','latitude' => '-3.2790484997189187','langitude' => '114.58485845495606','luas_area' => '2.9'],
            ['kode_lokasi' => '14','kode_pos' => '70234','user_id' => '1','kelurahan' => 'Pekapuran Raya','kecamatan' => 'Banjarmasin Timur','latitude' => '-3.3365705877149123','langitude' => '114.60467161536874','luas_area' => '0.67'],
            ['kode_lokasi' => '15','kode_pos' => '70118','user_id' => '1','kelurahan' => 'Pelambuan','kecamatan' => 'Banjarmasin Barat','latitude' => '-3.3205216766570507','langitude' => '114.56594224583777','luas_area' => '2.12'],
            ['kode_lokasi' => '16','kode_pos' => '70111','user_id' => '1','kelurahan' => 'Kertak Baru Ilir','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.3265415091557844','langitude' => '114.59170345236207','luas_area' => '0.79'],
            ['kode_lokasi' => '17','kode_pos' => '70115','user_id' => '1','kelurahan' => 'Pasar Lama','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.3084909852791697','langitude' => '114.59114555288697','luas_area' => '0.65'],
            ['kode_lokasi' => '18','kode_pos' => '70235','user_id' => '1','kelurahan' => 'Pekapuran Laut','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.327040935577701','langitude' => '114.60054092011787','luas_area' => '0.64'],
            ['kode_lokasi' => '19','kode_pos' => '70231','user_id' => '1','kelurahan' => 'Gadang','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.3182726198833863','langitude' => '114.59542624729806','luas_area' => '0.64'],
            ['kode_lokasi' => '20','kode_pos' => '70234','user_id' => '1','kelurahan' => 'Melayu','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.319847652120592','langitude' => '114.60090439438602','luas_area' => '1.3'],
            ['kode_lokasi' => '21','kode_pos' => '70117','user_id' => '1','kelurahan' => 'Teluk Dalam','kecamatan' => 'Banjarmasin Tengah','latitude' => '-3.3208001580363344','langitude' => '114.57861427236939','luas_area' => '2.36'],
            ['kode_lokasi' => '22','kode_pos' => '707182','user_id' => '1','kelurahan' => 'Tanjung','kecamatan' => 'Banjarmasin Selatan','latitude' => '-3.305554530710357','langitude' => '114.56089907693392','luas_area' => '3.1'],
        ]);
    }
}
