<?php

namespace App\Exports;

use App\Lokasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LokasiReport implements FromCollection
{
    
    protected $kecamatan;
    
    function __construct($kecamatan)
    {
        $this->kecamatan = $kecamatan;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lokasi::where('kecamatan', $this->kecamatan)->get();
    }
}
