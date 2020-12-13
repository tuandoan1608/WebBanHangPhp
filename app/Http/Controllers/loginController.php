<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    const ALL_GUARD = [
        'web'
      ];
    public function login()
    {

        if (auth()->check()) {
            return redirect()->to('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }
    public function guard()
    {
        return Auth::guard('web');
    }

    public function loginadmin(Request $request)
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $remember = $request->has('remember') ? true : false;
         
                if (Auth::guard('web')->attempt([
                    'email' => $request->username,
                    'password' => $request->password
                ], $remember)) {
                    return redirect()->to('admin/dashboard');
                } else {
                    return back()->withInput()->withErrors('Tài khoảng hoặc mật khẩu không đúng');
                }
            
        }

        
        return view('admin');
    }
    public function logoutadmin()
    {
       
            Auth::guard('web')->logout();
            return redirect()->to('/admin');
        
    }
}
