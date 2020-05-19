<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    public $timestamps 		= false;
    protected $table 		= 'T_Lokasi';
    protected $primaryKey 	= 'kode_pos';
    protected $guarded 		= [];

    public function score()
    {
        return $this->hasMany(Score::class, 'kode_pos');
    }
}
