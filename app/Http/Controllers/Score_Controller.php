<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lokasi;
use App\Score;

class Score_Controller extends Controller
{
    public function index() 
    {
        // Mengambil data lokasi yang belum memiliki Score
        $list_of_lokasi = Lokasi::doesnthave('score')->get();
        return view('administrator.tingkat-risiko', ['list_of_lokasi' => $list_of_lokasi]);
    }
    
    public function displayChart()
    {
        $BanjarmasinUtara = Score::getTotalTingkatRisiko('Banjarmasin Utara');
        $BanjarmasinSelatan = Score::getTotalTingkatRisiko('Banjarmasin Selatan');
        $BanjarmasinBarat = Score::getTotalTingkatRisiko('Banjarmasin Barat');
        $BanjarmasinTimur = Score::getTotalTingkatRisiko('Banjarmasin Timur');
                
        return view('guest.grafik-data', compact(['BanjarmasinUtara', 'BanjarmasinSelatan', 'BanjarmasinBarat', 'BanjarmasinTimur']));
    }

    public function getScoreLokasi()
    {
        $listOfScore = Score::with('lokasi', 'riskLevels')->get();
        $viewFile = (Auth::check()) ? 'administrator.hasil-kalkulasi' : 'guest.skor-risiko-kebakaran';
        return view($viewFile, compact('listOfScore'));
    }

    public function saveScoreLokasi(Request $request)
    {
        $kode_pos = $request->kode_pos;
        
        // Mengambil skor indikator untuk variabel Hazard (H)
        $H = array(
            'listrik'   => $request->listrik,
            'kompor'    => $request->kompor,
        );
        
        // Mengambil skor indikator untuk variabel Vulnerbility (V)
        $V = array(
            'kepadatan_penduduk'    => $request->kepadatan_penduduk,
            'kepadatan_bangunan'    => $request->kepadatan_bangunan,
            'ukuran_bangunan'       => $request->ukuran_bangunan,
            'jarak_bangunan'        => $request->jarak_bangunan,
            'konstruksi_bangunan'   => $request->konstruksi_bangunan,
            'lebar_jalan'           => $request->lebar_jalan,
            'jarak_bpk'             => $request->jarak_bpk,
        );

        // Mengambil skor indikator untuk variabel Capacity (C)
        $C = array (
            'hidran'        => $request->hydrant,
            'tandon_air'    => $request->tandon_air,
            'sumber_air'    => $request->sumber_air,
        );
        
        // Menghitung total skor pada variabel Hazard, Vulnerbility, dan Capacity
        $total_H = array_sum($H);
        $total_V = array_sum($V);
        $total_C = array_sum($C);

        // Proses perhitungan besaran nilai risiko kebakaran
        $besaran_risiko = Score::getBesaranRisiko($total_H, $total_V, $total_C);
    
        // Penentuan Kelas dan Zonasi tingkat risiko kebakaran
        $tingkat_risiko = Score::getTingkatRisiko($besaran_risiko);

        // Simpan Data Score ke dalam database
        Score::create([
            'kode_pos'              => $kode_pos,
            'tingkat_risiko'        => $tingkat_risiko,

            'skor_ancaman'          => $total_H,
            'skor_kerentanan'       => $total_V,
            'skor_ketahanan'        => $total_C,

            'listrik'               => $H['listrik'],
            'kompor'                => $H['kompor'],

            'kepadatan_penduduk'    => $V['kepadatan_penduduk'],
            'kepadatan_bangunan'    => $V['kepadatan_bangunan'],
            'ukuran_bangunan'       => $V['ukuran_bangunan'],
            'jarak_bangunan'        => $V['jarak_bangunan'],
            'konstruksi'            => $V['konstruksi_bangunan'],
            'lebar_jalan'           => $V['lebar_jalan'],
            'jarak_bpk'             => $V['jarak_bpk'],

            'hidran'                => $C['hidran'],
            'tandon_air'            => $C['tandon_air'],
            'sumber_air'            => $C['sumber_air'],

            'skor_akhir'            => $besaran_risiko,
            'tgl_entry'             => date("d/m/Y"),
        ]);

        return redirect('/administrator/tingkat-risiko/hasil-kalkulasi');
    }
}
