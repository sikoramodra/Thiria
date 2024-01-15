<?php

namespace App\Http\Controllers;

use App\Models\Publication;

class SiteController extends Controller {
    public function home() {
        return view('site.home', [
            'publication' => Publication::orderBy('created_at', 'desc')
                                        ->first()
        ]);
    }

    public function about() {
        return view('site.about_us');
    }
}
