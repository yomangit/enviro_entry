<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
 
class RegisterController extends Controller
{
     public function index()
     {
         return view('register.index');
     }
     public function store(Request $request)
     {
       $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>['required','min:5','max:255']
        ]);

        //  $validated['password']=bcrypt($validated['passoword']);
        $validated['password']=Hash::make($validated['password']);// facade provides secure Bcrypt and Argon2 hashing for storing user passwords. 
        User::create($validated);
        $request->session()->flash('success', 'Registration Successfull! please login'); 
        return redirect('/login');
     }
}
