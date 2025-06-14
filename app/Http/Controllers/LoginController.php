<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
           $credentials= $request->session()->regenerate();//regenerete di lakukan untuk menghindari sebuah teknik hacking session
         
            return redirect()->intended('/');
      
            // return redirect()->intended('/');
        }
 
        return back()->with('loginError','login failed');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();//supaya tidak bisa di pake
     
        $request->session()->regenerateToken();//bikin baru supaya tidak di bajak
     
        return redirect('/');
    }
}
