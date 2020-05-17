<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    public $timestamps = false;
    protected $table = 'T_Lokasi';
    protected $primaryKey = 'kode_pos';
    protected $guarded = [];
    //protected $fillable = ['kode_pos', 'user_id', 'lokasi', 'kelurahan', 'kecamatan', 'latitude', 'langitude', 'luas_area'];

    public function score()
    {
        return $this->hasMany(Score::class, 'kode_pos');
    }

}
