<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.home');
})->name('site.home');
