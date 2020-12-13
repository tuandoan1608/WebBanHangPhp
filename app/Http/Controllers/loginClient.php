<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class loginClient extends Controller
{
    const ALL_GUARD = [
        'userclient'
    ];
    public function index()
    {


        return view('auth.loginclient');
    }
    public function guard()
    {
        return Auth::guard('userclient');
    }

    public function login(Request $request)
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {

          
                if (Auth::guard('userclient')->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ])) {
                
                    return redirect('trang-chu');
                } else {
                    return back()->withInput()->withErrors('Tài khoảng hoặc mật khẩu không đúng');
                }
            
        }


        return view('/trang-chu');
    }
    public function logoutclient(Request $request)
    {
      
            
            Auth::guard('userclient')->logout(); 
            $request->session()->flush();
            return redirect()->to('/trang-chu');
            
        

    }
}
