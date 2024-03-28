<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function view_register(): View {
        return view('user.register');
    }

    public function register(RegisterUserRequest $request): RedirectResponse {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $newUser = new User($data);
        $newUser->save();

        Auth::login($newUser);

        return redirect()->route('site.home')
                         ->with('success', 'Successfully registered');
    }

    public function view_login(): View {
        return view('user.login');
    }

    public function login(LoginUserRequest $request): RedirectResponse {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors('error', 'Incorrect username or password');
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('site.home')
                         ->with('success', 'Successfully logged out');
    }

    public function view_show(User $user): View {
        return view('user.show', ['user' => $user]);
    }
}
