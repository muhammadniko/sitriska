<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public $timestamps = false;
    protected $table = 'T_Score';
    protected $primaryKey = 'kode_skor';
    protected $guarded = ['kode_skor'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class,'kode_pos');
    }

    public function riskLevels()
    {
        return $this->belongsTo(RiskLevel::class,'tingkat_risiko');
    }

    public static function countTingkatRisiko($kecamatan = NULL, $level)
    {
        if (empty($kecamatan)) {
            $result = Score::where('tingkat_risiko', $level)->count();
        } else {
            $result = Score::whereHas('lokasi', function ($query) use ($kecamatan) {
                $query->where('kecamatan', $kecamatan);
            })->where('tingkat_risiko', $level)->count();
        }
        
        return $result;
    }
    
    public static function getTotalTingkatRisiko($kecamatan = NULL)
    {
        $risikoTinggi = Score::countTingkatRisiko($kecamatan, 'Tinggi');
        $risikoSedang = Score::countTingkatRisiko($kecamatan, 'Sedang');
        $risikoRendah = Score::countTingkatRisiko($kecamatan, 'Rendah');
        
        $totalRisiko = [
            'Tinggi'=>$risikoTinggi,
            'Sedang'=>$risikoSedang,
            'Rendah'=>$risikoRendah,
        ];
        
        return $totalRisiko;
    }
    
    public static function getBesaranRisiko($H, $V, $C)
    {
        $R = ($H * $V) / $C;

        return $R;
    }

    public static function getTingkatRisiko($R) 
    {
        if ($R > 36) {
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
