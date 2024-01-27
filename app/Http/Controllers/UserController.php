<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function show(int $id) {
        $user = User::findOrFail($id);

        return view('user.show', ['user' => $user]);
    }

    public function form() {
        return view('user.form');
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();

        $newUser = new User($data);
        $newUser->password = Hash::make(($data['password']));
        $newUser->save();

        Auth::login($newUser);

        return redirect()->route(
            'site.home'
        )->with('success', 'Successfully registered');
    }
}
