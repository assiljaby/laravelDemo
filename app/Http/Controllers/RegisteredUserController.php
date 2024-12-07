<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $args = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8), 'confirmed'],
        ]);

        $user = User::create($args);

        Auth::login($user);

        return redirect('/jobs');
    }
}
