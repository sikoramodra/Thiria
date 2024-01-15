<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    function form() {
        return view('user.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->withErrors(['name' => 'Incorrect username or password']);
    }

   public function logout(Request $request) {
       Auth::logout();

       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect('/')->with('success', 'Successfully logged out');
   }
}
