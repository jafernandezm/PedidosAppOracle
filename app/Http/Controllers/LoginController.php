<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('layouts.index');
    }

    public function store(){
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }
        return redirect()->route('home');
    }
}
