<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            if(auth()->user()->role == 'admin'){
                session()->regenerate();
                return redirect('/admin/dashboard');
            }else{
                return back()->withErrors(['email'=>'Email or password invalid.']);
            }

        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/admin/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
