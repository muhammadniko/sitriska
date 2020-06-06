<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Score;
use App\Lokasi;


class User_Controller extends Controller
{
    
    public function index()
    {
        $BanjarmasinAll = Score::getTotalTingkatRisiko();
        $totalLokasi = Lokasi::getTotalLokasi();
        return view('administrator.dashboard', compact('BanjarmasinAll', 'totalLokasi'));
    }
    
    public function displayLoginPage() 
    {
        return view('administrator.login');
    }

    public function loginAuth(Request $request) 
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('users')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended('/administrator');
        } else {
            return redirect('/administrator/login');
        }
    }

    public function logout() 
    {
        if (Auth::guard('users')->check()) {
            Auth::guard('users')->logout();
          }
      
          return redirect('/administrator/login');
    }
}
