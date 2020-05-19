<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function getScore()
    {
        $listOfScore = Score::with('lokasi', 'risklevels')->get();

        return view('administrator.hasil-kalkulasi', compact('listOfScore'));
    }

    public function new_score(Request $request)
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
        $besaran_risiko = $this->kalkulasi_risiko($total_H, $total_V, $total_C);
    
        // Penentuan Kelas dan Zonasi tingkat risiko kebakaran
        $tingkat_risiko = $this->get_level($besaran_risiko);

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

        return redirect('/administrator');
    }

    public function kalkulasi_risiko($H, $V, $C)
    {
        $R = ($H * $V) / $C;

        return $R;
    }

    public function get_level($R) 
    {
        if (($R >= 36) && ($R <= 54)) {
            $tingkat_risiko = "Tinggi";
        } else if (($R >= 18) && ($R < 36)) {
            $tingkat_risiko = "Sedang";
        } else if (($R >= 1) && ($R < 18)) {
            $tingkat_risiko = "Rendah";
        } else {
            $tingkat_risiko = "Tidak Valid";
        }

        return $tingkat_risiko;
    }
}
