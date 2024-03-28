<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller {
    public function view_register(): View {
        return view('user.register');
    }

    public function view_login(): View {
        return view('user.login');
    }

    public function view_show(User $user): View {
        return view('user.show');
    }
}
