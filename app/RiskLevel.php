<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskLevel extends Model
{
    protected $table = 'T_RiskLevels';
    protected $primaryKey = 'tingkat_risiko';
    protected $keyType = 'string';
    public $timestamps = false;

    public function score()
    {
        return $this->hasMany(Score::class, 'tingkat_risiko');
    }
}
