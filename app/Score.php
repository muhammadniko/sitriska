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

    public function riskLevel()
    {
        return $this->belongsTo(RiskLevel::class, 'tingkat_risiko');
    }
}
