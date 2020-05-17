<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Users;
use Auth;

class User_Controller extends Controller
{
    public function show_login_page() 
    {
        return View::make('administrator.login');
    }

    public function show_dashboard_page()
    {
        return View::make('administrator.dashboard');
    }

    public function login_auth(Request $request) 
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
