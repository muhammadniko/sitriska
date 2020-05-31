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

    public static function getBesaranRisiko($H, $V, $C)
    {
        $R = ($H * $V) / $C;

        return $R;
    }

    public static function getTingkatRisiko($R) 
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
