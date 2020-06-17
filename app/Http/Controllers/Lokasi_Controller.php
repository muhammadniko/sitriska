<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LokasiReport;
use App\Score;
use App\Lokasi;


class Lokasi_Controller extends Controller
{
    public function index()
    {
        return view('guest.halaman-depan');
    }

    public function displayDataLokasi()
    {
        $listOfLokasi = Lokasi::with(['score'])->get();
        $viewFile = (Auth::check()) ? 'administrator.data-permukiman' : 'guest.data-permukiman';

        return view ($viewFile, compact('listOfLokasi'));
    }
    
    public function exportDataLokasi($kecamatan)
    {
        return Excel::download(new LokasiReport($kecamatan), 'lokasi_permukiman.xlsx');
    }

    public function saveDataLokasi(Request $request)
    {
        $dataLokasi = [
            'kode_pos'  => $request->kodepos,
            'user_id'   => $request->user_id,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'latitude'  => $request->lat,
            'langitude' => $request->lang,
            'luas_area' => $request->luasarea,
        ];

        Lokasi::create($dataLokasi);

        return back();
    }

    public function updateDataLokasi(Request $request)
    {
        $dataLokasi = [
            'kecamatan' => $request->kecamatan_updated,
            'kelurahan' => $request->kelurahan_updated,
        ];

        $kodePos = $request->curent_kodepos;

        $lokasi = Lokasi::find($kodePos);
        $lokasi->update($dataLokasi);

        return back();
    }

    public function removeDataLokasi($kodePos)
    {
        $lokasi = Lokasi::find($kodePos);
        $lokasi->score()->delete();
        $lokasi->delete();

        return back();
    }

}
