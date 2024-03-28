<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SiteController extends Controller {
    public function view_home(): View {
        return view('site.home');
    }

    public function view_about_us(): View {
        return view('site.about-us');
    }
}
