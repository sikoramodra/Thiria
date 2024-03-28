<?php

use App\Http\Controllers\CreatureController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'view_home'])
    ->name('site.home');

Route::get('/about-us', [SiteController::class, 'view_about_us'])
    ->name('site.about-us');

Route::get('/users/register', [UserController::class, 'view_register'])
     ->name('user.register');

Route::get('/users/login', [UserController::class, 'view_login'])
     ->name('user.login');

Route::get('/users/{user}', [UserController::class, 'view_show'])
     ->name('user.show'); // stats + change password

Route::get('/creatures', [CreatureController::class, 'view_list'])
     ->name('creatures.list');

Route::get('/creatures/{creature}', [CreatureController::class, 'view_show'])
     ->name('creatures.show');

Route::get('/creatures/add', [CreatureController::class, 'view_add'])
     ->name('creatures.add');

Route::get('/creatures/{creature}/edit', [CreatureController::class, 'view_edit'])
     ->name('creatures.edit');
