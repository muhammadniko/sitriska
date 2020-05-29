<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Score;
use App\Lokasi;

class Lokasi_Controller extends Controller
{
    public function index()
    {
        return view('guest.halaman-depan');
    }

    /*
        Halaman Lihat Data Lokasi
        Akses : Pengguna Umum
    */
    public function displayDataLokasi()
    {
        $listOfLokasi = Lokasi::with(['score'])->get();
        $viewFile = (Auth::check()) ? 'administrator.data-permukiman' : 'guest.data-permukiman';

        return view ($viewFile, compact('listOfLokasi'));
    }


    public function add_new_lokasi(Request $request)
    {
        $this->validate($request,[
            'kodepos' => 'required'
        ]);

        Lokasi::create([
            'kode_pos'  => $request->kodepos,
            'user_id'   => $request->user_id,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'latitude'  => $request->lat,
            'langitude' => $request->lang,
            'luas_area' => $request->luasarea,
        ]);

        return redirect('/administrator/permukiman');
    }

    public function update_lokasi(Request $request)
    {
        $kode_pos   = $request->kodeposupdated;

        $permukiman = Lokasi::where('kode_pos', $kode_pos);
        $permukiman->update(array(
            'kecamatan' => $request->kecamatanupdated,
            'kelurahan' => $request->kelurahanupdated,
        ));

        return redirect('/administrator/permukiman');
    }

    public function remove_lokasi($kode_pos)
    {
        $lokasi = Lokasi::find($kode_pos);
        $lokasi->score()->delete();
        $lokasi->delete();

        return redirect('/administrator/permukiman');
    }

}
