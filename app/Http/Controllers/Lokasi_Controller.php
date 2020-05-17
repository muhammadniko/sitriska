<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Lokasi;

class Lokasi_Controller extends Controller
{
    public function show_data_permukiman()
    {
        $list_of_lokasi = Lokasi::with(['score'])->get();
        return View::make('administrator.data-permukiman', ['list_of_lokasi' => $list_of_lokasi]);
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
        $permukiman = Lokasi::where('kode_pos', $kode_pos);
        $permukiman -> delete();

        return redirect('/administrator/permukiman');
    }

}
