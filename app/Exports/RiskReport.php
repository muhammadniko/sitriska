<?php

namespace App\Exports;

use App\Score;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RiskReport implements FromView
{
    protected $kecamatan;
    protected $level;
    
    function __construct($kecamatan, $level)
    {
        $this->kecamatan = $kecamatan;
        $this->level = $level;
    }
    
    public function view(): View
    {
        $kecamatan = $this->kecamatan;
        $level = $this->level;
        if ($level = "All") {
            $result = Score::whereHas('lokasi', function ($query) use ($kecamatan) {
                $query->where('kecamatan', $kecamatan);
            })->get();
        } else {
            $result = Score::where('tingkat_risiko', $this->level)
            ->whereHas('lokasi', function ($query) use ($kecamatan) {
                $query->where('kecamatan', $kecamatan);
            })->get();
        }
        
        $listOfScore = $result;
        $header = strtoupper($kecamatan);
        
        return view ('layout.report-risk', compact(['listOfScore', 'header']));
    }
}
