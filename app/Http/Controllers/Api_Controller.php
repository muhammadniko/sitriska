<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Score;

class Api_Controller extends Controller
{
    public function index()
    {
        $listOfScore = Score::with('lokasi', 'riskLevels')->get();
        return response()->json($listOfScore, 200);
    }

    public function show($lokasi)
    {
        $detailLokasi = Lokasi::with('score')->where('kelurahan', $lokasi)->get();
        return response()->json($detailLokasi, 200);
    }
}
