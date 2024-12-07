<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    function create(){
        return view('auth.login');
    }

    function store(Request $request){
        $attrs = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($attrs)){
            throw ValidationException::withMessages([
                'password' => 'The provided credentials do not match our records.'
            ]);
        }

        $request->session()->regenerate();

        return redirect('/jobs');
    }

    function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
