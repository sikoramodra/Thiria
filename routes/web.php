<?php

use App\Http\Controllers\CreatureController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'view_home'])
    ->name('site.view_home');
Route::get('/about-us', [SiteController::class, 'view_about_us'])
    ->name('site.view_about-us');

Route::get('/users/register', [UserController::class, 'view_register'])
    ->name('user.view_register');
Route::get('/users/login', [UserController::class, 'view_login'])
    ->name('user.view_login');
Route::get('/users/{user}', [UserController::class, 'view_show'])
    ->name('user.view_show'); // stats + change password

Route::post('/users/register', [UserController::class, 'register'])
    ->name('user.register');
Route::post('/users/login', [UserController::class, 'login'])
     ->name('user.login');
Route::post('/users/logout', [UserController::class, 'logout'])
     ->name('user.logout');

Route::get('/creatures', [CreatureController::class, 'view_list'])
    ->name('creatures.view_list');
Route::get('/creatures/{creature}', [CreatureController::class, 'view_show'])
    ->name('creatures.view_show');
Route::get('/creatures/add', [CreatureController::class, 'view_add'])
    ->name('creatures.view_add');
Route::get('/creatures/{creature}/edit', [CreatureController::class, 'view_edit'])
    ->name('creatures.view_edit');
